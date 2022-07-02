<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Store;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use \Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('search')) {
            $title = 'for ' . request('search');
        }

        if (Auth::user()) {
            $itemwishlist = Wishlist::all();

            return view('customer.products', [
                'title' => 'Foresell | Products ' . $title,
                'products' => Product::with(['store', 'category'])->latest()->filter(request(['search']))->paginate(20)->withQueryString(),
                'itemwishlist' => $itemwishlist
            ]);
        } else {
            return view('customer.products', [
                'title' => 'Foresell | Products ' . $title,
                'products' => Product::with(['store', 'category'])->latest()->filter(request(['search']))->paginate(20)->withQueryString()
            ]);
        }
    }

    public function show(Product $product)
    {
        if (Auth::user()) {
            $itemwishlist = Wishlist::all();
            return view('customer.product', [
                'title' => $product->name,
                'product' => $product,
                'products' => $product,
                'itemwishlist' => $itemwishlist
            ]);
        } else {
            return view('customer.product', [
                'title' => $product->name,
                'product' => $product,
                'products' => $product
            ]);
        }
    }
}
