<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; // Import PDF

class PageController extends Controller
{
    /**
     * Menampilkan halaman detail tiket.
     */
    public function viewDetailTicket(Order $order)
    {
        // Keamanan: Pastikan yang login adalah pemilik tiket
        if ($order->customer_id !== Auth::guard('customer')->id()) {
            abort(403, 'Akses Ditolak');
        }

        $payment = $order->payment;
        $snap_token = '';

        // Jika order 'pending', buat Snap Token baru untuk "Bayar Sekarang"
        if($order->payment_status == 'pending') {
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

            $transaction_details = ['order_id' => $order->invoice_number, 'gross_amount' => $order->total_amount];
            
            $customer_details = [
                'first_name' => $order->customer->name,
                'last_name'  => "",
                'email'      => $order->customer->email,
                'phone'      => $order->customer->phone,
            ];

            // PENTING: Mengambil data dari relasi orderItem
            $item_details = [[
                'id' => $order->orderItem->product->id,
                'price' => $order->orderItem->price, // Ambil harga saat order
                'quantity' => $order->orderItem->quantity,
                'name' => $order->orderItem->product->product_name,
            ]];

            $transaction = [
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
            ];

            try {
                $snap_token = \Midtrans\Snap::getSnapToken($transaction);
                // Update atau buat data payment
                Payment::updateOrCreate(
                    ['order_id' => $order->id],
                    [
                        'amount' => $order->total_amount,
                        'status' => 'pending',
                        'snap_token' => $snap_token
                    ]
                );
            } catch (\Exception $e) {
                $snap_token = '';
                // Tangani error, misal: redirect back with error
            }
        }

        // Ganti 'detail-ticket' jika nama file Anda 'ticket_detail.blade.php'
        return view('detail-ticket', compact('order', 'snap_token'));
    }

    /**
     * Membuat dan men-download tiket sebagai PDF.
     */
    public function downloadTicketPDF(Order $order)
    {
        // Keamanan
        if ($order->customer_id !== Auth::guard('customer')->id()) {
            abort(403, 'Akses Ditolak');
        }

        // Pastikan sudah lunas
        if ($order->payment_status !== 'success') {
             return redirect()->route('view-detail-ticket', $order)->with('error', 'Tiket belum lunas.');
        }

        $data = ['order' => $order];
        $pdf = Pdf::loadView('ticket_pdf', $data); // Panggil view PDF
        $filename = 'tiket-alammayang-' . $order->invoice_number . '.pdf';
        
        return $pdf->download($filename);
    }
    public function showCart()
    {
        // Pastikan user login
        $customer = Auth::guard('customer')->user();
        if (!$customer) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil order milik customer yang statusnya masih pending
        $order = Order::where('customer_id', $customer->id)
                    ->where('payment_status', 'pending')
                    ->with(['orderItem.product'])
                    ->first();

        // Kirim ke view keranjang.blade.php
        return view('keranjang', compact('order'));
    }
}