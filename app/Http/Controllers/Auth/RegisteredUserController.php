<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Route;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $route = Route::current();
        // dd($route);
        return view('customer.register', [
            'title' => 'Register'
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
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

        return redirect('/login')->with('success', 'Your Account has been created successfully! Please Login');
    }
}
