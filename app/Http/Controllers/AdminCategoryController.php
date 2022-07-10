<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AdminCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // $categories = AdminCategory::select('id', 'name', 'slug', 'image', 'created_at')->get();

        $categories = AdminCategory::where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('slug', 'LIKE', '%'.$keyword.'%')
        ->orWhere('created_at', 'LIKE', '%'.$keyword.'%')
        ->orderby('name', 'ASC')->paginate(10);

        $categories->withPath('/admin-foresell/list/catego$category');
        $categories->appends($request->all());

        return view('admin.category.index', compact('categories','keyword'));
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
            'name' => 'required|max:50',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $image = time().'-'.$request->image->getClientOriginalName();
        $request->image->move('image\admin\category', $image);

        AdminCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $image,
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');

        return redirect(route('category.index'));
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
        $category = AdminCategory::select('id','image', 'name')->find($id);

        return view('admin.category.edit', compact('category'));
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
            'name' => 'required|max:50',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $category = AdminCategory::whereId($id)->first();

        if($request->image){

            File::delete('image/admin/category/'. $category->image);

            $image =  time().'-'.$request->image->getClientOriginalName();
            $request->image->move('image\admin\category', $image);

            $data['image'] = $image;
        }

        $category->update($data);

        Alert::success('Success', 'Data berhasil diperbaharui');

        return redirect()->route('category.index');
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

    public function confirm($id)
    {
        alert()->question('Perhatian!','Apa kamu yakin ingin menghapus?')
        ->showConfirmButton('<a href="/admin-foresell/list/category/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin-foresell/list/category');
    }

    public function delete($id)
    {
        $category = AdminCategory::whereId($id)->firstOrFail();
        File::delete('image/admin/category/'. $category->logo);
        $category->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin-foresell/list/category');
    }
}
