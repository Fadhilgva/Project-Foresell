<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    // use \Cviebrock\EloquentSluggable\Sluggable;
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('desc', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['store'] ?? false, function ($query, $store) {
            return $query->whereHas('store', function ($query) use ($store) {
                $query->where('slug', $store);
            });
        });
    }

    public function Store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
