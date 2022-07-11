<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Bank()
    {
        return $this->belongsTo(Payment::class, 'bank_id');
    }
    public function Courier()
    {
        return $this->belongsTo(Courier::class, 'courier_id');
    }
    public function OrderDetail()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
