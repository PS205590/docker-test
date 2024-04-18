<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $fillable = [
        'product_id',
        'quantity',
    ];
    protected $attributes = [
        'quantity' => 0, // Specify default value for quantity attribute
    ];

    // Define relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }




}
