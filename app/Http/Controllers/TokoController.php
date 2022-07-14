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
    public function index()
    {
        $stores = Store::select('id','name', 'location', 'created_at')->get();

        return view("admin.toko.index", compact('stores'));
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
        $total = DB::table(DB::raw('products'))
                        ->select(DB::raw('monthname(order_details.created_at) AS bulan,  stores.name AS name, round(SUM(order_details.price * order_details.qty * (100 - order_details.discount)/ 100),2) AS total'))
                        ->join('order_details', 'products.id', '=', 'order_details.product_id')
                        ->join('stores', 'products.store_id', '=', 'stores.id')
                        ->where('stores.id', $id)
                        ->orderBy('order_details.created_at', 'ASC')
                        ->groupByRaw('bulan, name')->pluck('total');

        $bulan = DB::table(DB::raw('products'))
                        ->select(DB::raw('monthname(order_details.created_at) AS bulan,  stores.name AS name, round(SUM(order_details.price * order_details.qty * (100 - order_details.discount)/ 100),2) AS total'))
                        ->join('order_details', 'products.id', '=', 'order_details.product_id')
                        ->join('stores', 'products.store_id', '=', 'stores.id')
                        ->where('stores.id', $id)
                        ->orderBy('order_details.created_at', 'ASC')
                        ->groupByRaw('bulan, name')->pluck('bulan');



        return view('admin.toko.show', compact('store', 'total', 'bulan','name'));
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
        alert()->question('Perhatian!','Apa kamu yakin ingin menghapus?')
        ->showConfirmButton('<a href="/admin-foresell/list/toko/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin-foresell/list/toko');
    }

    public function delete($id)
    {
        $toko = Store::whereId($id)->firstOrFail();
        File::delete('image/adminToko/'. $toko->image);
        $toko->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin-foresell/list/toko');
    }
}
