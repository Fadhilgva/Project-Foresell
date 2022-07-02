<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionBanner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
