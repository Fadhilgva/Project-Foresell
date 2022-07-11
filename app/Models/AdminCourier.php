<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCourier extends Model
{
    use HasFactory;
    protected $table = 'couriers';
    protected $fillable = ['name', 'image'];
}
