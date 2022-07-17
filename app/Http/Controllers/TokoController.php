<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $stores = Store::join('users', 'users.id', '=', 'stores.user_id')
            ->groupByRaw('stores.id, stores.name, users.email, users.name, stores.slug, stores.location, users.phone, stores.created_at')
            ->select(DB::raw('stores.id AS id, stores.name AS name, stores.slug AS slug, users.phone AS phone, stores.location AS location,
                                        users.email AS email, users.name AS userName,
                                        stores.created_at AS created_at'))->get();

        $revenue_store = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                stores.name AS name,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->get();

        return view("admin.toko.index", compact('stores', 'revenue_store'));
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

        $store = Store::whereId($id)->first();
        $name = Store::whereId($id)->select('name')->pluck('name');
        $total2017 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2017)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');

        $bulan2017 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2017)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        $total2018 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2018)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2018 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2018)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        $total2019 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2019)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2019 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2019)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        $total2020 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2020)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2020 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2020)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        $total2021 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2021)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2021 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2021)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        $total2022 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2022)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('total');


        $bulan2022 = Store::join('products', 'products.store_id', '=', 'stores.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 'Finished')
            ->where('stores.id', $id)
            ->whereYear('order_details.created_at', 2022)
            ->select(DB::raw('  monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('YEAR(order_details.created_at), MONTH(order_details.created_at)')->pluck('bulan');

        return view('admin.toko.show', compact('store', 'name', 'total2020', 'bulan2020', 'total2021', 'bulan2022', 'total2022', 'bulan2021', 'total2019', 'bulan2019', 'total2018', 'bulan2018', 'total2017', 'bulan2017'));
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
    public function confirm($id)
    {
        alert()->question('Perhatian!', 'Apa kamu yakin ingin menghapus?')
            ->showConfirmButton('<a href="/admin-foresell/list/toko/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
            ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin-foresell/list/toko');
    }

    public function delete($id)
    {
        $toko = Store::whereId($id)->firstOrFail();

        File::delete('image/adminToko/logo/' . $toko->image);
        File::delete('image/adminToko/logo/' . $toko->banner);
        $toko->user->delete();
        $toko->Products->delete();
        $toko->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin-foresell/list/toko');
    }
}
