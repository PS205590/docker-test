<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $fillable = [
        'product_id',
        'quantity' => 0, // Provide a default value for quantity
    ];

    // Define relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }




}
