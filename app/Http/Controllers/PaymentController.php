<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product; 
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Constructor untuk mengatur kunci Midtrans
     */
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    /**
     * Menampilkan halaman keranjang
     */
    public function showCart()
    {
        // Ambil data order milik user yang login
        $order = \App\Models\Order::where('customer_id', auth('customer')->id())
            ->latest()
            ->first();

        if (!$order) {
            return redirect()->route('home')->with('error', 'Keranjang kosong');
        }

        // Buat Snap Token hanya jika status pembayaran belum sukses
        $snap_token = '';
        if (in_array($order->payment_status, ['pending', 'failed'])) {
            $params = [
                'transaction_details' => [
                    'order_id' => $order->invoice_number,
                    'gross_amount' => $order->total_amount,
                ],
                'customer_details' => [
                    'first_name' => $order->customer->name ?? 'Guest',
                    'email' => $order->customer->email ?? '',
                ],
            ];

            try {
                $snap_token = \Midtrans\Snap::getSnapToken($params);
            } catch (\Exception $e) {
                $snap_token = ''; // biar tidak error di blade
            }
        }

        // Kirim ke view
        return view('keranjang', compact('order', 'snap_token'));
    }

    /**
     * Method untuk memproses data dari keranjang.blade.php
     */
    public function processPayment(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'visit_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0'
        ]);

        $product = Product::find($request->ticket_id);
        if (!$product) {
            return response()->json(['error' => 'Tiket tidak ditemukan'], 404);
        }

        $recalculatedTotal = $product->price * $request->quantity;
        if ((int)$request->total_amount != $recalculatedTotal) {
            return response()->json(['error' => 'Total harga tidak valid.'], 400);
        }

        $user = Auth::guard('customer')->user();
        if (!$user) {
            return response()->json(['error' => 'Anda harus login terlebih dahulu.'], 401);
        }

        $order = null;
        try {
            DB::beginTransaction();

            $order = Order::create([
                'customer_id' => $user->id,
                'invoice_number' => 'INV-' . $user->id . '-' . Str::random(8),
                'order_date' => now(),
                'total_amount' => $recalculatedTotal,
                'payment_status' => 'pending',
                'date_of_visit' => $request->visit_date,
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Gagal membuat pesanan: ' . $e->getMessage()], 500);
        }

        $params = [
            'transaction_details' => [
                'order_id' => $order->invoice_number,
                'gross_amount' => $order->total_amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
            ],
            'item_details' => [
                [
                    'id' => $product->id,
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                    'name' => $product->product_name,
                ]
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return response()->json([
                'snap_token' => $snapToken,
                'order_id' => $order->invoice_number,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleCallback(Request $request)
    {
        $notif = new \Midtrans\Notification();
        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;
        $orderId = $notif->order_id;

        $order = Order::where('invoice_number', $orderId)->first();
        if (!$order) return response()->json(['error' => 'Order not found'], 404);
        if (in_array($order->payment_status, ['success', 'settlement'])) {
            return response()->json(['message' => 'Order already processed'], 200);
        }

        if ($transaction == 'capture' && $fraud == 'accept') {
            $this->updateOrderStatus($order, 'success', $notif);
        } elseif ($transaction == 'settlement') {
            $this->updateOrderStatus($order, 'success', $notif);
        } elseif ($transaction == 'cancel') {
            $this->updateOrderStatus($order, 'canceled', $notif);
        } elseif ($transaction == 'deny') {
            $this->updateOrderStatus($order, 'failed', $notif);
        } elseif ($transaction == 'expire') {
            $this->updateOrderStatus($order, 'expired', $notif);
        }

        return response()->json(['message' => 'Notification handled successfully'], 200);
    }

    protected function updateOrderStatus(Order $order, string $status, $notif)
    {
        $order->update(['payment_status' => $status]);
        Payment::updateOrCreate(
            ['order_id' => $order->id],
            [
                'payment_method' => $notif->payment_type ?? 'N/A',
                'amount' => $notif->gross_amount,
                'status' => $status,
                'payment_date' => in_array($status, ['success', 'settlement']) ? now() : null,
                'raw_response' => json_encode($notif),
            ]
        );
    }
}
