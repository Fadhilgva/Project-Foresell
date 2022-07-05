<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $cartdetail = CartDetail::where('user_id', $itemuser->id)->get();
        $cart = Cart::where('user_id', $itemuser->id)->latest()->get();

        return view('customer.cart', [
            'title' => 'Cart',
            'carts' => $cart,
            'cartdetail' => $cartdetail
        ]);
    }

    public function store($id)
    {
        $userid = auth()->user()->id;
        $product = Product::find($id);
        $userproduct = Cart::where('user_id', $userid)->where('product_id', $product->id)->first();
        $userdetail = CartDetail::where('user_id', $userid)->first();


        if ($userproduct) {
            $userproduct->qty += 1;
            $userproduct->total_product += ($product->price * ((100 - $product->discount) / 100)) * 1;
            $userproduct->save();

            if ($userdetail) {
                $userdetail['total_disc'] += ($product->price * (($product->discount) / 100));
                $userdetail['total'] += ($product->price * ((100 - $product->discount) / 100)) * 1;
                $userdetail->save();
                return back()->with('success', 'Product Added to Cart Successfully');
            } else {
                $cart['user_id'] = $userid;
                $cart['total_disc'] = ($product->price * (($product->discount) / 100));
                $cart['total'] = ($product->price * ((100 - $product->discount) / 100)) * 1;
                $itemcart = CartDetail::create($cart);
                return back()->with('success', 'Product Added to Cart Successfully');
            }
        } else {
            $input['user_id'] = $userid;
            $input['product_id'] = $product->id;
            $input['qty'] = 1;
            $input['total_product'] = ($product->price * ((100 - $product->discount) / 100)) * 1;
            $itemcart = Cart::create($input);

            if ($userdetail) {
                $userdetail['total_disc'] += ($product->price * (($product->discount) / 100));
                $userdetail['total'] += ($product->price * ((100 - $product->discount) / 100)) * 1;
                $userdetail->save();
                return back()->with('success', 'Product Added to Cart Successfully');
            } else {
                $cart['user_id'] = $userid;
                $cart['total_disc'] = ($product->price * (($product->discount) / 100));
                $cart['total'] = ($product->price * ((100 - $product->discount) / 100)) * 1;
                $itemcart = CartDetail::create($cart);
                return back()->with('success', 'Product Added to Cart Successfully');
            }
        }
    }

    public function storeproduct(Request $request, $id)
    {
        $userid = auth()->user()->id;
        $product = Product::find($id);
        $userproduct = Cart::where('user_id', $userid)->where('product_id', $product->id)->first();
        $userdetail = CartDetail::where('user_id', $userid)->first();


        if ($userproduct) {
            $userproduct->qty += $request->quantity;
            $userproduct->total_product += ($product->price * ((100 - $product->discount) / 100)) * $request->quantity;
            $userproduct->save();

            if ($userdetail) {
                $userdetail['total_disc'] += ($product->price * (($product->discount) / 100)) * $request->quantity;
                $userdetail['total'] += ($product->price * ((100 - $product->discount) / 100)) * $request->quantity;
                $userdetail->save();
                return back()->with('success1', 'Product Added to Cart Successfully');
            } else {
                $cart['user_id'] = $userid;
                $cart['total_disc'] = ($product->price * (($product->discount) / 100)) * $request->quantity;
                $cart['total'] = ($product->price * ((100 - $product->discount) / 100)) * $request->quantity;
                $itemcart = CartDetail::create($cart);
                return back()->with('success1', 'Product Added to Cart Successfully');
            }
        } else {
            $input['user_id'] = $userid;
            $input['product_id'] = $product->id;
            $input['qty'] = $request->quantity;
            $input['total_product'] = ($product->price * ((100 - $product->discount) / 100)) * $request->quantity;
            $itemcart = Cart::create($input);

            if ($userdetail) {
                $userdetail['total_disc'] += ($product->price * (($product->discount) / 100)) * $request->quantity;
                $userdetail['total'] += ($product->price * ((100 - $product->discount) / 100)) * $request->quantity;
                $userdetail->save();
                return back()->with('success1', 'Product Added to Cart Successfully');
            } else {
                $cart['user_id'] = $userid;
                $cart['total_disc'] = ($product->price * (($product->discount) / 100)) * $request->quantity;
                $cart['total'] = ($product->price * ((100 - $product->discount) / 100)) * $request->quantity;
                $itemcart = CartDetail::create($cart);
                return back()->with('success1', 'Product Added to Cart Successfully');
            }
        }
    }

    public function destroy(Request $request)
    {
        $delete = CartDetail::where('user_id', Auth::user()->id)->get();
        $itemcart = Cart::findOrFail($request->id);
        if ($itemcart) {
            foreach ($delete as $dele) {
                $dele->total_disc -= ($itemcart->product->price * (($itemcart->product->discount) / 100)) * $itemcart->qty;
                $dele->total -= ($itemcart->product->price * ((100 - $itemcart->product->discount) / 100)) * $itemcart->qty;
                $dele->save();
            }
            $itemcart->delete();
            return back();
        } else {
            return back();
        }
    }
}
