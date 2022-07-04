<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Cart()
    {
        return $this->hasMany(Cart::class, 'cart_id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function updatedetail($itemdetail, $qty, $price, $discount)
    {
        $this->attributes['qty'] = $itemdetail->qty + $qty;
        $this->attributes['total_product'] = $itemdetail->subtotal + ($qty * ($price - $discount));
        self::save();
    }
}
