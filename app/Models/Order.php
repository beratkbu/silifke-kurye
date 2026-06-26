<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

protected $fillable = [
        'customer_name',
        'phone',
        'region',
        'pickup_address',
        'delivery_address',
        'price',
        'status',
        'courier_id'
    ];

    // Bir siparişin bir kuryesi olur (İlişki tanımı)
    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}