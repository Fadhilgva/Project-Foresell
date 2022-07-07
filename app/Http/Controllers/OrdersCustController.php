<?php

namespace App\Http\Controllers;

use App\Models\AdminBank;
use App\Models\Orders;
use App\Models\CartDetail;
use App\Models\Cart;
use App\Models\Courier;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrdersCustController extends Controller
{
    public function index()
    {
        return view('customer.shipping', [
            'title' => 'Shipping'
        ]);
    }

    public function updateaddress(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255|',
            'email' => 'required|email:dns|',
            'phone' => 'required|min:8|max:15',
            'city' => 'required|min:3|max:50',
            'address' => 'required|min:20|max:200',
            'postalcode' => 'required|min:5|max:7'
        ]);

        $user = Orders::create([
            'user_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'email'  => $validatedData['email'],
            'phone'  => $validatedData['phone'],
            'city'  => $validatedData['city'],
            'address'  => $validatedData['address'],
            'postalcode'  => $validatedData['postalcode']
        ]);

        return redirect('/billing');
    }

    public function billing()
    {
        $banks = AdminBank::all();
        $couriers = Courier::all();
        $cartdetail = CartDetail::where('user_id', Auth()->user()->id)->get();
        $carts = Cart::where('user_id', Auth()->user()->id)->get();
        return view('customer.billing', [
            'title' => 'Billing',
            'banks' => $banks,
            'cartdetails' => $cartdetail,
            'carts' => $carts,
            'couriers' => $couriers
        ]);
    }

    public function storebilling(Request $request)
    {
        $orders = Orders::where('user_id', Auth()->user()->id)->latest()->get();
        $cartdetails = CartDetail::where('user_id', Auth()->user()->id)->get();
        $carts = Cart::where('user_id', Auth()->user()->id)->get();

        if ($cartdetails) {
            foreach ($cartdetails as $cartdetail) {
                $validatedData['total_disc'] = $cartdetail->total_disc;
                $validatedData['total'] = $cartdetail->total;
                $cartdetail->delete();
            }
        } else {
            return redirect('/cart');
        }

        $validatedData['bank_id'] = $request->bank;
        $validatedData['courier_id'] = $request->courier;

        Orders::where('user_id', $request->user()->id)
            ->take(1)
            ->latest()
            ->update($validatedData);

        if ($carts) {
            foreach ($carts as $cart) {
                foreach ($orders as $order) {
                    OrderDetails::create([
                        'product_id' => $cart->product_id,
                        'order_id' => $order->id,
                        'price' => $cart->product->price,
                        'qty' => $cart->qty,
                        'discount' => $cart->product->discount
                    ]);
                }
                $cart->delete();
            }
        } else {
            return redirect('/cart');
        }

        foreach ($carts as $cart) {
            $product = Product::find($cart->product->id);
            $product['stock'] -= $cart->qty;
            $product['sold'] += $cart->qty;
            $product->save();
        }

        return redirect('/completed');
    }

    public function completed()
    {
        return view('customer.completed', [
            'title' => 'Completed'
        ]);
    }
}