<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public $fillable = [
        'name',
        'brand_id',
        'price',
        'price_with_discount',
        'discount',
        'article',
        'description',
        'category_id',
        'inHome'
    ];

}
