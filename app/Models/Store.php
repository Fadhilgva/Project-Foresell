<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
