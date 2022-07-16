<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        $store = Store::whereId(Auth::user()->store->id)->first();
        $name = Store::whereId(Auth::user()->store->id)->select('name')->pluck('name');
        $total2022 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2022)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2022 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2022)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        $total2021 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2021)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2021 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2021)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        return view('admin_toko.data_penjualan.index', compact('store', 'total2022', 'bulan2022', 'name', 'total2021', 'bulan2021'));
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
