<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    protected $table = 'data_produk';
    protected $fillable = ['category_id', 'store_id', 'image', 'name', 'slug', 'price', 'stock', 'sold', 'discount','desc'];
}
