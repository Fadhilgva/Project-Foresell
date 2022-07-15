<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\PromotionBanner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBannerStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::select('id', 'name')->get();

        $banner = PromotionBanner::join('stores', 'stores.id', '=', 'promotion_banners.store_id')
                                ->select(DB::raw('promotion_banners.image, promotion_banners.id AS id, stores.id AS store_id, stores.name, promotion_banners.created_at'))
                                ->get();

        return view('admin.banner.store.index', compact('store', 'banner'));
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
        $request->validate([
            'store' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $image = time().'-'.$request->image->getClientOriginalName();
        $request->image->move('image\admin\banner\store', $image);

        PromotionBanner::create([
            'store_id' => $request->store,
            'image' => $image,
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');

        return redirect(route('bannerStore.index'));
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

        $stores = Store::select('id', 'name')->get();

        $banner = PromotionBanner::where('id', $id)->first();

        $store = PromotionBanner::
                 join('stores', 'stores.id', '=', 'promotion_banners.store_id')
                ->select(DB::raw('promotion_banners.id AS id, promotion_banners.store_id AS store_id, stores.name AS name'))
                ->where('promotion_banners.id', $id)->first();

        return view('admin.banner.store.edit', compact('stores', 'banner', 'store'));
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
        $request->validate([
            'store' => '',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'store_id' => $request->store,
        ];

        $banner= PromotionBanner::whereId($id)->first();

        if($request->image){

            File::delete('image/admin/banner/store/'. $banner->image);

            $image =  time().'-'.$request->image->getClientOriginalName();
            $request->image->move('image\admin\banner\store', $image);

            $data['image'] = $image;
        }

        $banner->update($data);

        Alert::success('Success', 'Data berhasil diperbaharui');

        return redirect()->route('bannerStore.index');
    }

    public function confirm($id)
    {
        alert()->question('Perhatian!','Apa kamu yakin ingin menghapus?')
        ->showConfirmButton('<a href="/admin-foresell/list/banner-store/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin-foresell/list/banner-store');
    }

    public function delete($id)
    {
        $banner = PromotionBanner::whereId($id)->firstOrFail();
        File::delete('image/admin/banner/store/'. $banner->image);
        $banner->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin-foresell/list/banner-store');
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
