<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_id'];

    public function order()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
