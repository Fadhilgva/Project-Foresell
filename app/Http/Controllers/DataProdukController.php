<?php

namespace App\Http\Controllers;

use App\DataProduk;
use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DataProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function data_produk(){
    //     return view('data_produk.data_produk');
    // }
    // public function index()
    // {
    //     $data_produk = DataProduk::get();
    //     return view('data_produk.index',compact('data_produk'));
    // }
    public function index()
    {
        $data_produk = Product::latest()->get();
        // $category = Category::latest()->get();
        // $store = Store::latest()->get();

        return view('admin_toko.data_produk.index',compact('data_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::get();

        $store = Store::all();

        $store_id = User::find(Auth::user()->id)->store;

        // dd($store_id);
        return view('admin_toko.data_produk.create',compact('store','category', 'store_id'));
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
            'category_id' => 'required',
            // 'store_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'price' => 'required',
            'stock' => 'required',
            // 'sold' => 'required',
            'discount' => 'required',
            'desc' => 'required',
        ]);

        // DB::table('categories')->insert([
        //     'category_id' => $request['category_id'],
        // ]);

        // DB::table('stores')->insert([
        //     'store_id' => $request['store_id'],
        // ]);

        $store_id = User::find(Auth::user()->id)->store;

        $image = time().'.'.$request->image->getClientOriginalName();
        $request->image->move(public_path('img/admin_store'),$image);

        $data_produk = new Product;

        $data_produk->category_id = $request->category_id;
        $data_produk->store_id = $store_id->id;
        $data_produk->image = $image;
        $data_produk->name = $request->name;
        $data_produk->slug = $request->slug;
        $data_produk->price = $request->price;
        $data_produk->stock = $request->stock;
        // $data_produk->sold = $request->sold;
        $data_produk->discount = $request->discount;
        $data_produk->desc = $request->desc;

        $data_produk->save();

        Alert::success('Success', "Data berhasil ditambahkan");

        return redirect('/admin_toko/data_produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data_produk_id)
    {
        $data_produk = Product::where('id', $data_produk_id)->first();
        return view('admin_toko.data_produk.show',compact('data_produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($data_produk_id)
    {
        $data_produk = Product::where('id', $data_produk_id)->first();
        $category = Category::get();
        $store = Store::all();
        return view('admin_toko.data_produk.edit', compact('data_produk','category','store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data_produk)
    {
        $request->validate([
            'category_id' => 'required',
            // 'store_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
            'name' => '',
            'slug' => '',
            'price' => '',
            'stock' => '',
            // 'sold' => '',
            'discount' => '',
            'desc' => '',
        ]);


        // DB::table('categories','stores')->insert([
        //     'category_id' => $request['category_id'],
        // ]);

        // DB::table('stores')->insert([
        //     'store_id' => $request['store_id'],
        // ]);

        $data_produk = Product::find($data_produk);
        $store_id = User::find(Auth::user()->id)->store;

        $data = [
            $data_produk->category_id = $request['category_id'],
            $data_produk->store_id = $store_id->id,
            // $data_produk->image = $request['image'],
            $data_produk->name = $request['name'],
            $data_produk->slug = $request->slug,
            $data_produk->price = $request['price'],
            $data_produk->stock = $request['stock'],
            // $data_produk->sold = $request->sold;
            $data_produk->discount = $request['discount'],
            $data_produk->desc = $request['desc']

        ];

        if($request->image){
            File::delete('img/admin_store/'. $data_produk->image);

            $image =  time().'-'.$request->image->getClientOriginalName();
            $request->image->move('img\admin_store', $image);

            $data['image'] = $image;
        }
        // $image = time().'.'.$request->image->extension();
        // $request->image->move(public_path('img/admin_store'),$image);

        $data_produk->update($data);
        Alert::success('Update','Data Film Berhasil Diupdate !');
        return redirect('/admin_toko/data_produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($data_produk_id)
    // {
    //     $data_produk = Product::find($data_produk_id);
    //     $data_produk->delete();

    //     return redirect('/admin_toko/data_produk');
    // }

    public function confirm($id)
    {
        alert()->question('Perhatian!','Apa kamu yakin ingin menghapus?')
        ->showConfirmButton('<a href="/admin_toko/data_produk/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('admin_toko/data_produk');
    }

    public function delete($id)
    {
        $data_produk = Product::find($id);
        File::delete('img/admin_store/'. $data_produk->image);
        $data_produk->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('admin_toko/data_produk');
    }

    public function checkSlug(Request $request)
    {
        $slug = "";
        if(!empty($request->name)) {
            $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        }

        return response()->json(['slug' => $slug]);
    }
}
