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
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2022)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2022 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2022)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        $total2021 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2021)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2021 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2021)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');
        
        $total2017 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2017)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2017 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2017)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        $total2018 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2018)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2018 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2018)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');
        
        $total2019 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2019)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2019 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2019)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        $total2020 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2020)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2020 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', 'Finished')
            ->where('stores.id', Auth::user()->store->id)
            ->whereYear('order_details.created_at', 2020)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');
        
        

        
        
        return view('admin_toko.data_penjualan.index', compact('store', 'name', 'total2020', 'bulan2020', 'total2021', 'bulan2022', 'total2022', 'bulan2021', 'total2019', 'bulan2019', 'total2018', 'bulan2018', 'total2017', 'bulan2017'));
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
