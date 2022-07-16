<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select(DB::raw('users.id as id, users.name as userName, users.email AS Email,
                                 roles.name as RoleName, users.phone as Phone, users.address as Address,
                                 users.created_at as Register'))
            ->get();



        // dd($users);
        return view('admin.users.index', compact('users'));
    }

    public function show(Request $request, $id)
    {
        // SELECT monthname(od.created_at) AS bulan,  u.name AS name,
        // round(SUM(od.price * od.qty * (100 - od.discount)/ 100),2) AS total
        // FROM order_details od, users u, products p, orders o
        // WHERE u.id = o.user_id
        // AND o.id = od.order_id
        // AND p.id = od.product_id
        // GROUP BY bulan, o.user_id
        // ORDER BY MONTH(od.created_at) ASC

        $user = User::whereId($id)->first();
        $name = User::whereId($id)->select('name')->pluck('name');
        $total2022 = DB::table(DB::raw('users'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  users.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->where('orders.status', 'Finished')
            ->where('users.id', $id)
            ->whereYear('order_details.created_at', '=', 2022)
            ->groupByRaw('bulan, users.id')
            ->orderBy('order_details.created_at', 'ASC')->pluck('total');

        $bulan2022 = DB::table(DB::raw('users'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  users.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->where('orders.status', 'Finished')
            ->where('users.id', $id)
            ->whereYear('order_details.created_at', '=', 2022)
            ->groupByRaw('bulan, users.id')
            ->orderBy('order_details.created_at', 'ASC')->pluck('bulan');

        $total2021 = DB::table(DB::raw('users'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  users.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->where('orders.status', 'Finished')
            ->where('users.id', $id)
            ->whereYear('order_details.created_at', '=', 2021)
            ->groupByRaw('bulan, users.id')
            ->orderBy('order_details.created_at', 'ASC')->pluck('total');

        $bulan2021 = DB::table(DB::raw('users'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  users.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->where('orders.status', 'Finished')
            ->where('users.id', $id)
            ->whereYear('order_details.created_at', '=', 2021)
            ->groupByRaw('bulan, users.id')
            ->orderBy('order_details.created_at', 'ASC')->pluck('bulan');

        return view('admin.users.show', compact('user', 'total2021', 'bulan2021', 'total2022', 'bulan2022', 'name'));
    }

    public function confirm($id)
    {
        alert()->question('Perhatian!', 'Apa kamu yakin ingin menghapus?')
            ->showConfirmButton('<a href="/admin-foresell/list/users/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
            ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin-foresell/list/users');
    }

    public function delete($id)
    {
        $user = User::whereId($id)->first();

        if ($user->hasRole('adminToko')) {
            File::delete('image/adminToko/logo/' . $user->store->image);
            File::delete('image/adminToko/logo/' . $user->store->banner);

            $user->store->delete();
            $user->store->Products->delete();
            $user->delete();
        } elseif ($user->hasRole('adminForesell')) {
            Alert::error('Failed Delete', 'You cannot delete role Admin Foresell');
            return redirect('/admin-foresell/list/users');
        } else {
            $user->delete();

            Alert::success('Success', 'Data berhasil dihapus');
            return redirect('/admin-foresell/list/users');
        }
    }
}
