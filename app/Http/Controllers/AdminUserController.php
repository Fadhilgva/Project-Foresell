<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = DB::select("SELECT u.name as UserName, u.email AS Email, r.name as RoleName, u.phone as Phone, u.address as Address, u.created_at as Register
        FROM users u, role_user ru, roles r
        WHERE u.id = ru.user_id
        AND ru.role_id = r.id
        ");

        // dd($users);
        return view('admin.users', compact('users'));
    }
}
