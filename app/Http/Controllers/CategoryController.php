<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('customer.categories', [
            'title' => 'Foresell | All Categories',
            'categories' => Category::all()
        ]);
    }

    public function show()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->name;
        }

        if (Auth::user()) {
            $itemwishlist = Wishlist::all();

            return view('customer.category', [
                'title' => 'Product ' . $title,
                'products' => Product::with(['store', 'category'])->latest()->filter(request(['search', 'category']))->paginate(20)->withQueryString(),
                'itemwishlist' => $itemwishlist
            ]);
        } else {
            return view('customer.category', [
                'title' => 'Product ' . $title,
                'products' => Product::with(['store', 'category'])->latest()->filter(request(['search', 'category']))->paginate(20)->withQueryString()
            ]);
        }
    }
}
