<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'image',
        'color',
        'barcode',
        'height_cm',
        'width_cm',
        'depth_cm',
        'weight_gr',
    ];
    public function orders()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
    public function inventory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inventory::class);
    }
}
