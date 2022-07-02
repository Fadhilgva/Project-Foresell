<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCustomers extends Model
{
    use HasFactory;
    protected $table = 'Customers';
    protected $guarded = [];

    /**
     * Get all of the orders for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
