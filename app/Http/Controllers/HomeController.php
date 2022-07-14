<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use App\Models\PromotionBanner;
use App\Models\Store;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $itemwishlist = Wishlist::all();

            return view('customer.home', [
                'title' => 'Foresell | Situs Jual Beli Online',
                'promotionbanners' => PromotionBanner::with(['store'])->get(),
                'promotions' => Promotion::with(['category'])->get(),
                'stores' => Store::latest()->get(),
                'products' => Product::with(['store', 'category'])->orderByDesc('sold')->get(),
                'itemwishlist' => $itemwishlist
            ]);
        } else {


            return view('customer.home', [
                'title' => 'Foresell | Situs Jual Beli Online',
                'promotionbanners' => PromotionBanner::with(['store'])->get(),
                'promotions' => Promotion::with(['category'])->get(),
                'stores' => Store::all(),
                'products' => Product::with(['store', 'category'])->orderByDesc('sold')->get()
            ]);
        }
    }

    public function about()
    {
        return view('customer.about    ', [
            'title' => 'Foresell | About Us'
        ]);
    }
}

#-------------------------------------------------------------------------------------------------------
// class HomeController extends Controller
// {
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }

//     /**
//      * Show the application dashboard.
//      *
//      * @return \Illuminate\Contracts\Support\Renderable
//      */
//     public function index()
//     {
//         return view('home');
//     }
// }
