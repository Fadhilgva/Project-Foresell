<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Orders;
use App\Models\CartDetail;
use App\Models\Cart;
use App\Models\Courier;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use  App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

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
        $banks = Payment::all();
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
                foreach ($orders->take(1) as $order) {
                    OrderDetails::create([
                        'product_id' => $cart->product_id,
                        'order_id' => $order->id,
                        'price' => $cart->product->price * ((100 - $cart->product->discount) / 100),
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

    public function showorders()
    {

        $orders = Orders::where('user_id', Auth::user()->id)->get();

        return view('customer.orders', [
            'title' => 'Your Orders',
            'orders' => $orders
        ]);
    }

    public function showordersdetails($id)
    {
        $order_details = OrderDetails::where('order_id', $id)->latest()->get();
        $orders = Orders::find($id);

        return view('customer.details', [
            'title' => 'Your Orders',
            'orderdetails' => $order_details,
            'orders' => $orders
        ]);
    }

    public function confirm($id)
    {
        Alert::question('Order Confirmation', 'Have you received the products and have no complaints?')
            ->showConfirmButton('<a href="/orders/' . $id . '/delete" class="text-white" style="text-decoration: none"> Confirm</a>', '#3085d6')->toHtml()
            ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return back();
    }

    public function delete($id)
    {
        $order = Orders::find($id);

        $order_details = OrderDetails::where('order_id', '=', $order->id)->get();
        foreach ($order_details as $order_detail) {
            $order_detail->delete();
        }
        $order->delete();

        Alert::success('Success', 'Your order has been canceled');
        return back();
    }

    public function confirmOrder($id)
    {
        Alert::question('Order Confirmation', 'Have you received the products and have no complaints?')
            ->showConfirmButton('<a href="/orders/' . $id . '/finish-order" class="text-white" style="text-decoration: none"> Confirm</a>', '#3085d6')->toHtml()
            ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return back();
    }

    public function finishOrder($id)
    {
        $order = Orders::find($id);

        $order->status = "Finished";
        $order->save();

        Alert::success('Success', 'Thank you for making a purchase');
        return back();
    }

    public function update(Request $request, $id)
    {
        $order = Orders::find($id);
        $order->status = $request->status;
        $order->save();

        return back();
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $order = Orders::find($id);

        $image = time() . '-' . $request->image->getClientOriginalName();
        $request->image->move('image\upload', $image);

        $order->upload = $image;
        $order->save();

        return back();
    }
}
