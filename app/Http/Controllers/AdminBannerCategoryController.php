<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\PromotionBanner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBannerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::select('id', 'name')->get();

        $banner = Promotion::join('categories', 'categories.id', '=', 'promotions.category_id')
                                ->select(DB::raw('promotions.image, promotions.desc, promotions.id AS id, categories.id AS category_id, categories.name, promotions.created_at'))
                                ->get();

        return view('admin.banner.category.index', compact('category', 'banner'));
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
            'category' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'desc' => 'required'
        ]);

        $image = time().'-'.$request->image->getClientOriginalName();
        $request->image->move('image\admin\banner\category', $image);

        Promotion::create([
            'category_id' => $request->category,
            'image' => $image,
            'desc' => $request->desc
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');

        return redirect(route('bannerCategory.index'));
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

        $categories = Category::select('id', 'name')->get();

        $banner = Promotion::where('id', $id)->first();

        $category = Promotion::join('categories', 'categories.id', '=', 'promotions.category_id')
                                    ->select(DB::raw('promotions.image, promotions.desc, promotions.id AS id, categories.id AS category_id, categories.name, promotions.created_at'))
                                    ->where('promotions.id', $id)->first();

        return view('admin.banner.category.edit', compact('categories', 'banner', 'category'));
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
            'category' => '',
            'image' => 'mimes:jpg,jpeg,png',
            'desc' => ''
        ]);

        $data = [
            'category_id' => $request->category,
            'desc' => $request->desc,
        ];

        $banner= Promotion::whereId($id)->first();

        if($request->image){

            File::delete('image/admin/banner/category/'. $banner->image);

            $image =  time().'-'.$request->image->getClientOriginalName();
            $request->image->move('image\admin\banner\category', $image);

            $data['image'] = $image;
        }

        $banner->update($data);

        Alert::success('Success', 'Data berhasil diperbaharui');

        return redirect()->route('bannerCategory.index');
    }

    public function confirm($id)
    {
        alert()->question('Perhatian!','Apa kamu yakin ingin menghapus?')
        ->showConfirmButton('<a href="/admin-foresell/list/banner-category/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin-foresell/list/banner-category');
    }

    public function delete($id)
    {
        $banner = Promotion::whereId($id)->firstOrFail();
        File::delete('image/admin/banner/category/'. $banner->image);
        $banner->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin-foresell/list/banner-category');
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
