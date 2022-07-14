<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Orders;
use App\Models\Courier;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Faker\Provider\ru_RU\Payment;
use Illuminate\Support\Facades\Auth;

class DataOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $store = User::where('users.id', Auth::user()->id)
            ->join('stores', 'users.id', '=', 'stores.user_id')
            ->select('stores.name')->get();

        $orders = Orders::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('stores', 'products.store_id', '=', 'stores.id')
            ->where('stores.user_id', '=', Auth::user()->id)
            ->count('order_details.id');

        $ordersprocess = Orders::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('stores', 'products.store_id', '=', 'stores.id')
            ->where('stores.user_id', '=', Auth::user()->id)
            ->where('orders.status', '=', 'Processed')
            ->count('order_details.id');

        $valueMonth = Store::where('stores.user_id', Auth::user()->id)
            ->join('products', 'stores.id', '=', 'products.store_id')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereMonth('orders.created_at', Carbon::now()->format('m'))
            ->sum('orders.total');

        $valueYear = Store::where('stores.user_id', Auth::user()->id)
            ->join('products', 'stores.id', '=', 'products.store_id')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereYear('orders.created_at', date("Y"))
            ->sum('orders.total');

        $orderstore = OrderDetails::join('products', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('stores', 'products.store_id', '=', 'stores.id')
            ->where('stores.user_id', '=', Auth::user()->id)
            ->select('order_details.price AS price', 'order_details.qty AS qty', 'order_details.discount AS discount', 'order_details.created_at AS created_at', 'orders.status AS status', 'order_details.*', 'orders.name')->latest()->get();
        
        return view('admin_toko.data_order.index', [
            'store' => $store,
            'orders' => $orders,
            'ordersprocess' => $ordersprocess,
            'valueMonth' => $valueMonth,
            'valueYear' => $valueYear,
            'orderstore' => $orderstore

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($data_order_id)
    {
        $orders = Orders::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('stores', 'products.store_id', '=', 'stores.id')
            ->where('stores.user_id', '=', Auth::user()->id)
            ->count('order_details.id');

        $orders = Orders::where('id', $data_order_id)->first();
        
        return view('admin_toko.data_order.index', [
            'orders' => $orders,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'status' => 'required',
            
        ]);

        $orders = Orders::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('stores', 'products.store_id', '=', 'stores.id')
            ->where('stores.user_id', '=', Auth::user()->id)
            ->count('order_details.id');
        
        // $orders = Orders::find($data_order_id);

        $orders->status = $request['status'];

        $orders->save();
        return view('admin_toko.data_order', [
            'orders' => $orders,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $orders = Orders::find($id);

        $orders->delete();

        return redirect('admin_toko.data_order');
    }
}
