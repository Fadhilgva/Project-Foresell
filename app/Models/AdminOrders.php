<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminOrders extends Model
{

    use HasFactory;
    protected $table = 'Orders';
    protected $guarded = [];

    /**
     * Get the customer that owns the Orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'CustomerID');
    }

}
