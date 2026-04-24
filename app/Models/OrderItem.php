<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    // TAMBAHKAN INI
    public function product()
    {
        return $this->belongsTo(Batik::class, 'product_id');
    }
}