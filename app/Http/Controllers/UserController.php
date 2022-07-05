<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view(
            'customer.profile',
            ['title' => 'Profile']
        );
    }

    public function edit()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user) {
                return view(
                    'customer.edit',
                    [
                        'user' => $user,
                        'title' => 'Edit Profile'
                    ]
                );
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $rules = [
            'name' => 'required|max:255|',
            'email' => 'required|email:dns|',
            'phone' => 'required|min:8|max:15',
            'city' => 'required|min:3|max:50',
            'address' => 'required|min:20|max:200',
            'postalcode' => 'required|min:5|max:7'
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }

        if ($request->phone != $user->phone) {
            $rules['phone'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($user) {
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->city = $validatedData['city'];
            $user->address = $validatedData['address'];
            $user->postalcode = $validatedData['postalcode'];

            $user->save();

            return redirect('/profile')->with('updateprofile', 'Your profile has been successfully updated');
        } else {
            return redirect()->back();
        }
    }
}
