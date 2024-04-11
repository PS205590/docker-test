<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primary_id = 'id';

    protected $fillable = [
        'name',
        'description',
    ];
}
