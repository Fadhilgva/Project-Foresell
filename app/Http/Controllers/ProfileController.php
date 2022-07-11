<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = User::where('users.id', Auth::user()->id)
            ->join('stores', 'users.id', '=', 'stores.user_id')
            ->select('stores.name AS store', 'stores.image AS image', 'stores.location AS location', 'stores.desc AS desc', 'stores.banner AS banner')->get();
        return view('admin_toko.profile.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = User::where('users.id', Auth::user()->id)
            ->join('stores', 'users.id', '=', 'stores.user_id')
            ->select('stores.name AS store', 'stores.image AS image', 'stores.location AS location', 'stores.desc AS desc', 'stores.id AS id', 'stores.banner AS banner')->get();
        return view('admin_toko.profile.editprofiletoko', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $store = Store::find($id);
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255|',
            'description' => 'required|min:20|max:50',
            'location' => 'required|min:5|max:20',
            'banner' => 'mimes:jpg,jpeg,png',
            'image' => 'mimes:jpg,jpeg,png'
        ]);

        if ($request->banner) {
            File::delete(public_path('/image/adminToko/logo/' . $store->banner));

            $banner = time() . '-' . $request->banner->getClientOriginalName();
            $request->banner->move('image\adminToko\logo', $banner);
            $store->banner = $banner;
        }


        if ($request->image) {
            File::delete(public_path('/image/adminToko/logo/' . $store->image));

            $image = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move('image\adminToko\logo', $image);
            $store->image = $image;
        }


        if ($store) {
            $store->name = $validatedData['name'];
            $store->slug = Str::slug($validatedData['name']);
            $store->location = $validatedData['location'];
            $store->desc = $validatedData['description'];
            $store->save();

            return redirect('/admin_toko/profile')->with('updateprofile', 'Your profile has been successfully updated');
        } else {
            return redirect()->back();
        }
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
