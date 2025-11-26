<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi.
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Relasi yang dimuat otomatis saat mengambil OrderItem.
     * $with = ['product'] berarti $order->orderItem->product sudah akan ada.
     */
    protected $with = ['product']; 

    /**
     * Relasi ke Product (Detail produk/tiket)
     * Untuk kode: $order->orderItem->product->product_name
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relasi ke Order (Induk dari item ini)
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}