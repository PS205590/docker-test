<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $primary_id = 'id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'color',
        'height_cm',
        'width_cm',
        'depth_cm',
        'weight_gr',
    ];

    public function inventory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inventory::class);
    }
}
