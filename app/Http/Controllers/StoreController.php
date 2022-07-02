<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use App\Models\Wishlist;
use \Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
{

    public function index()
    {
        $title = '';
        if (request('store')) {
            $store = Store::firstWhere('slug', request('store'));
            $title = $store->name;
        }

        if (Auth::user()) {
            $itemwishlist = Wishlist::all();

            return view('customer.store', [
                'title' => 'Foresell | ' . $title,
                'products' => Product::with(['store', 'category'])->latest()->filter(request(['search', 'store']))->paginate(20)->withQueryString(),
                'itemwishlist' => $itemwishlist
            ]);
        } else {
            return view('customer.store', [
                'title' => 'Foresell | ' . $title,
                'products' => Product::with(['store', 'category'])->latest()->filter(request(['search', 'store']))->paginate(20)->withQueryString()
            ]);
        }
    }
}
