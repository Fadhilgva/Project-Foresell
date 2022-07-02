<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $itemwishlist = Wishlist::latest()->where('user_id', $itemuser->id)
            ->paginate(20);

        return view('customer.wishlist', [
            'title' => 'Your Wishlist',
            'itemwishlist' => $itemwishlist
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
        ]);

        $itemuser = $request->user();
        $validasiwishlist = Wishlist::where('product_id', $request->product_id)
            ->where('user_id', $itemuser->id)
            ->first();

        if ($validasiwishlist) {
            $validasiwishlist->delete(); //kalo udah ada, berarti wishlist dihapus
            return back();
        } else {
            $inputan = $request->all();
            $inputan['user_id'] = $itemuser->id;
            $itemwishlist = Wishlist::create($inputan);
            return back();
        }
    }

    public function destroy(Request $request)
    {
        $itemwishlist = Wishlist::findOrFail($request->id);
        if ($itemwishlist->delete()) {
            return back();
        } else {
            return back();
        }
    }
}
