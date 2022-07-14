<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orders;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class DataOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data_order = Orders::latest()->get();
        $user_id = User::latest()->get();
        $courier_id = Courier::latest()->get();

        return view('admin_toko.data_order.index',compact('user_id','courier_id', 'data_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_toko.data_order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'bank_id' => 'required',
            'courier_id' => 'required',
            'total_disc' => 'required',
            'total' => 'required',
            'status' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address_city' => 'required',
            'postal_code' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data_order_id)
    {
        $data_order = OrderDetails::where('id', $data_order_id)->first();

        return view('admin_toko.data_order.show',compact('data_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
