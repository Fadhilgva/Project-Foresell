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
        $data_produk = Product::join('stores', 'products.store_id', '=', 'stores.id')
            ->where('stores.user_id', '=', Auth::user()->id)->latest('products.created_at')
            ->select('products.*')->get();

        // dd($data_produk);
        // $category = Category::latest()->get();
        // $store = Store::latest()->get();

        return view('admin_toko.data_produk.index', compact('data_produk'));
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
        return view('admin_toko.data_produk.create', compact('store', 'category', 'store_id'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=1/1',
            'image1' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=1/1',
            'image2' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=1/1',
            'image3' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=1/1',
            'name' => 'required|min:5|max:50',
            'slug' => 'required|unique:products,slug',
            'price' => 'required',
            'discount' => 'min:0|max:90',
            'stock' => 'required',
            'desc' => 'required|min:20',
        ]);

        // DB::table('categories')->insert([
        //     'category_id' => $request['category_id'],
        // ]);

        // DB::table('stores')->insert([
        //     'store_id' => $request['store_id'],
        // ]);

        $store_id = User::find(Auth::user()->id)->store;

        $image = time() . '.' . $request->image->getClientOriginalName();
        $request->image->move(public_path('img/admin_store'), $image);
        $image1 = time() . '.' . $request->image1->getClientOriginalName();
        $request->image1->move(public_path('img/admin_store'), $image1);

        if ($request->image2) {
            $image2 = time() . '.' . $request->image2->getClientOriginalName();
            $request->image2->move(public_path('img/admin_store'), $image2);
        }

        if ($request->image3) {
            $image3 = time() . '.' . $request->image3->getClientOriginalName();
            $request->image3->move(public_path('img/admin_store'), $image3);
        }

        $data_produk = new Product;

        $data_produk->category_id = $request->category_id;
        $data_produk->store_id = $store_id->id;
        $data_produk->image = $image;
        $data_produk->image1 = $image1;
        if ($request->image2) {
            $data_produk->image2 = $image2;
        }

        if ($request->image3) {
            $data_produk->image3 = $image3;
        }
        $data_produk->name = $request->name;
        $data_produk->slug = $request->slug;
        $data_produk->price = $request->price;
        $data_produk->stock = $request->stock;
        if ($request->discount) {
            $data_produk->discount = $request->discount;
        }
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
        return view('admin_toko.data_produk.show', compact('data_produk'));
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
        return view('admin_toko.data_produk.edit', compact('data_produk', 'category', 'store'));
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
        $rules = [
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=1/1',
            'image1' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=1/1',
            'image2' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=1/1',
            'image3' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=1/1',
            'name' => 'required|min:5|max:50',
            'price' => 'required',
            'stock' => 'required',
            'discount' => 'numeric|min:0|max:90',
            'desc' => 'required|min:20',
        ];

        $data_produk = Product::find($data_produk);
        $store_id = User::find(Auth::user()->id)->store;

        if ($data_produk->slug != $request->slug) {
            $rules['slug'] = 'required|unique:products';
        } else {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        $data = [
            $data_produk->category_id = $validatedData['category_id'],
            $data_produk->store_id = $store_id->id,
            $data_produk->name = $validatedData['name'],
            $data_produk->slug = $validatedData['slug'],
            $data_produk->price = $validatedData['price'],
            $data_produk->stock = $validatedData['stock'],
            $data_produk->discount = $validatedData['discount'],
            $data_produk->desc = $validatedData['desc']
        ];

        if ($validatedData['image']) {
            File::delete('img/admin_store/' . $data_produk->image);

            $image =  time() . '-' . $validatedData['image']->getClientOriginalName();
            $validatedData['image']->move('img\admin_store', $image);

            $data['image'] = $image;
        }

        if ($validatedData['image1']) {
            File::delete('img/admin_store/' . $data_produk->image1);

            $image1 =  time() . '-' . $validatedData['image1']->getClientOriginalName();
            $validatedData['image1']->move('img\admin_store', $image1);

            $data['image1'] = $image1;
        }

        if ($request->image2) {
            File::delete('img/admin_store/' . $data_produk->image2);

            $image2 =  time() . '-' . $validatedData['image2']->getClientOriginalName();
            $validatedData['image2']->move('img\admin_store', $image2);

            $data['image2'] = $image2;
        }

        if ($request->image3) {
            File::delete('img/admin_store/' . $data_produk->image3);

            $image3 =  time() . '-' . $validatedData['image3']->getClientOriginalName();
            $validatedData['image3']->move('img\admin_store', $image3);

            $data['image3'] = $image3;
        }
        // $image = time().'.'.$request->image->extension();
        // $request->image->move(public_path('img/admin_store'),$image);

        $data_produk->update($data);
        Alert::success('Update', 'Product Berhasil Diupdate !');
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
        alert()->question('Perhatian!', 'Apa kamu yakin ingin menghapus?')
            ->showConfirmButton('<a href="/admin_toko/data_produk/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
            ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('admin_toko/data_produk');
    }

    public function delete($id)
    {
        $data_produk = Product::find($id);
        File::delete('img/admin_store/' . $data_produk->image);
        File::delete('img/admin_store/' . $data_produk->image1);
        if ($data_produk->image2) {
            File::delete('img/admin_store/' . $data_produk->image2);
        }
        if ($data_produk->image3) {
            File::delete('img/admin_store/' . $data_produk->image3);
        }
        $data_produk->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('admin_toko/data_produk');
    }

    public function checkSlug(Request $request)
    {
        $slug = "";
        if (!empty($request->name)) {
            $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        }

        return response()->json(['slug' => $slug]);
    }
}
