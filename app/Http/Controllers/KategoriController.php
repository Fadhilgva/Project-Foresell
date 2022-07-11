<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminCategory;
use Illuminate\Support\Facades\File;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = AdminCategory::all();
        return view('admin_toko.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_toko.kategori.create');
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
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'slug' => 'required',
            'desc' => 'required',
        ]);

        $kategori = new AdminCategory;

        $imageName = time().'.'.$request->desc->extension();

        $request->desc->move(public_path('image.adminToko'),$imageName);

        $kategori = new AdminCategory;

        $kategori->name = $request->name;
        $kategori->image = $imageName;
        $kategori->slug = $request->slug;
        $kategori->desc = $request->desc;

        $kategori->save();

        //Alert::success('Berhasil !', 'Tambah Data Film Berhasil');
        return redirect('admin_toko.kategori');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kategori_id)
    {
        $Kategori = AdminCategory::where('id', $kategori_id)->first();
        return view('admin_toko.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kategori_id)
    {
        return view('admin_toko.kategori.edit');
        $Kategori = AdminCategory::where('id', $kategori_id)->first();

        return view('admin_toko.kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kategori_id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'slug' => 'required',
            'desc' => 'required',
        ]);

        $kategori = AdminCategory::find($kategori_id);

        $kategori->name = $request['name'];
        $kategori->image = $request['image'];
        $kategori->slug = $request['slug'];
        $kategori->desc = $request['desc'];

        $kategori->save();

        return redirect('/admin_toko/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kategori_id)
    {
        $kategori = AdminCategory::find($kategori_id);

        $kategori -> delete();

        // $path = "gambar/";
        // File::delete($path.$kategori->video_senam);
        // $kategori->delete();
        // //Alert::success('Delete','Data Film Berhasil Dihapus !');
        return redirect('/admin_toko/kategori');
    }
}
