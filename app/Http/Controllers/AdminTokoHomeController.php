<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTokoHomeController extends Controller
{
    public function index()
    {
        $store = User::where('users.id', Auth::user()->id)
            ->join('stores', 'users.id', '=', 'stores.user_id')
            ->select('stores.name')->get();

        $orders = User::where('users.id', Auth::user()->id)
            ->join('stores', 'users.id', '=', 'stores.user_id')
            ->join('products', 'stores.id', '=', 'products.store_id')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->select('order_details.product_id')->count();

        $values = User::where('users.id', Auth::user()->id)
            ->join('stores', 'users.id', '=', 'stores.user_id')
            ->join('products', 'stores.id', '=', 'products.store_id')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->select('order_details.price', 'order_details.qty')
            ->get();

        // dd($value);

        return view('admin_toko.home.index', [
            'store' => $store,
            'orders' => $orders,
            'values' => $values
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
