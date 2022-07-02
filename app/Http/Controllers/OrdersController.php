<?php

namespace App\Http\Controllers;

use App\Models\AdminCustomers;
use App\Models\AdminOrders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function statusPayment()
    {
        $customers = AdminCustomers::select('ContactName')->get();

        $orders = AdminOrders::select('ShipVia');

        // $post = Post::select('id', 'id_kategori', 'title', 'slug', 'thumbnail')->where('id_users', Auth::user()->id)->latest()->paginate(4);

        return view('admin.orders.statusPayment', compact('customers', 'orders'));
    }

    public function statusShip()
    {
        $customers = AdminCustomers::select('ContactName')->get();

        $orders = AdminOrders::select('ShipVia');

        // $post = Post::select('id', 'id_kategori', 'title', 'slug', 'thumbnail')->where('id_users', Auth::user()->id)->latest()->paginate(4);

        return view('admin.orders.shipStatus', compact('customers', 'orders'));
    }


}
