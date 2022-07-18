<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Orders::join('order_details', 'order_details.order_id', '=', 'orders.id')
                       ->join('products', 'products.id', '=', 'order_details.product_id')
                       ->join('payment', 'payment.id', '=', 'orders.bank_id')
                       ->join('couriers', 'couriers.id', '=', 'orders.courier_id')
                       ->join('stores', 'stores.id', '=', 'products.store_id')
                       ->join('users', 'users.id', '=', 'orders.user_id')
                       ->select(DB::raw('orders.id AS id, users.id AS userId, orders.name AS name, orders.email AS email,
                                        products.name AS productName, stores.name AS storeName, order_details.qty AS qty, order_details.discount AS discount,
                                        round(SUM(order_details.price * order_details.qty),2) AS total,
                                        orders.status AS status, payment.name AS paymentName, couriers.name AS courierName,
                                        orders.address AS address, orders.created_at AS dateOrder'))
                       ->orderByRaw('dateOrder DESC')
                       ->groupByRaw('id')->get();
    
        return view('admin.order.index', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $order = Orders::find($id);
        $order->status = $request->status;
        $order->save();
        return back();
    }
}
