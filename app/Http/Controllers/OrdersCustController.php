<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrdersCustController extends Controller
{
    public function index()
    {
        return view('customer.shipping', [
            'title' => 'Shipping'
        ]);
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255|',
            'email' => 'required|email:dns|',
            'phone' => 'required|min:8|max:15',
            'city' => 'required|min:3|max:50',
            'address' => 'required|min:20|max:200',
            'postalcode' => 'required|min:5|max:7'
        ]);

        $user = Orders::create([
            'user_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'email'  => $validatedData['email'],
            'phone'  => $validatedData['phone'],
            'city'  => $validatedData['city'],
            'address'  => $validatedData['address'],
            'postalcode'  => $validatedData['postalcode']
        ]);

        return redirect('/billing');
    }
}
