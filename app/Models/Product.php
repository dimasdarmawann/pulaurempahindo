<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'category',
        'origin',
        'volume',
        'abv',
        'price',
        'image',
        'featured',
    ];
}
