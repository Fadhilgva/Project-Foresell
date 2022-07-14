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
        $users = user::all();
        $stores =Store::all();
        $order_details = OrderDetails::all();
        $order = Orders::all();
        $shipping = Payment::bank();
        
        return view('admin_toko.data_order.index', [
            'users' => $users,
            'stores' => $stores,
            'order_details' => $order_details,
            'order' => $order,
            'shipping' => $shipping,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin_toko.data_order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        //     'name' => 'required|min:5|max:50',
        //     'slug' => 'required|unique:products,slug',
        //     'price' => 'required',
        //     'stock' => 'required',
        //     'desc' => 'required|min:20|max:200',
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data_order_id)
    {
        // $data_order = OrderDetails::where('id', $data_order_id)->first();

        // return view('admin_toko.data_order.show',compact('data_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($data_order_id)
    {
        $users = user::all();
        $stores =Store::all();
        $order_details = OrderDetails::all();
        $order = Orders::all();
        $shipping = Payment::bank();
        
        return view('admin_toko.data_order.index', [
            'users' => $users,
            'stores' => $stores,
            'order_details' => $order_details,
            'order' => $order,
            'shipping' => $shipping,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data_order)
    {
        $request->validate([
            'status' => 'required',
            
        ]);

        $data_order = Product::find($data_order);
        
        $data_order->status = $request['status'];

        $data_order->update($data_order);
        return redirect('/admin_toko/data_order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data_order = OrderDetails::find($id);
        $data_order->delete();


        return redirect('admin_toko/data_order');
    }
}
