<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi (alternatif dari $guarded)
     */
    protected $fillable = [
        'customer_id',
        'invoice_number',
        'order_date',
        'total_amount',
        'payment_status',
        'date_of_visit',
    ];

    /**
     * Relasi yang dimuat otomatis saat mengambil Order.
     * $with = ['customer'] berarti $order->customer sudah akan ada.
     */
    protected $with = ['customer'];

    /**
     * Relasi ke Customer (Pemilik order)
     * Untuk kode: $order->customer->name
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relasi ke OrderItem (Item di dalam order)
     * Untuk kode: $order->orderItem->quantity
     */
    public function orderItem()
    {
        return $this->hasOne(OrderItem::class);
    }

    /**
     * Relasi ke Payment (Status pembayaran)
     * Untuk kode: $order->payment
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}