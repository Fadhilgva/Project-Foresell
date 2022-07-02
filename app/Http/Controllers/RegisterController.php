<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index()
    {
        return view('customer.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|',
            'email' => 'required|email:dns|unique:users',
            'phone' => 'required|unique:users|min:8|max:15',
            'password' => 'required|min:5|max:255|same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create([
            'name' => $validatedData['name'],
            'email'  => $validatedData['email'],
            'phone'  => $validatedData['phone'],
            'password'  => $validatedData['password']
        ]);

        $user->attachRole('user');

        event(new Registered($user));

        Auth::login($user);

        return redirect('/login')->with('success', 'Your Account has been created successfully! Please Login');
    }
}
