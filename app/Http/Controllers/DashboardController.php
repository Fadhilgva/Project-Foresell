<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\AdminCategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

class DashboardController extends Controller
{
    public function index()
    {

        $stores = Store::count();
        $categories = Category::count();
        $users = User::count();
        $products = Product::count();

        // $countUser = DB::select(DB::raw("
        //             SELECT r.name AS name, count(u.id) AS countUser
        //             FROM users u, role_user ru, roles r
        //             WHERE u.id = ru.user_id
        //             AND ru.role_id = r.id
        //             GROUP BY name "));
        $topUser = User::select(DB::raw('users.id AS id, users.name AS name, count(users.id) AS total'))
                    ->join('orders', 'orders.user_id', '=', 'users.id')
                    ->groupByRaw('users.id, users.name')
                    ->orderBy('total', 'DESC')
                    ->limit(10)->get();

        $topProduct = Product::select(DB::raw('products.id AS id, products.name, count(order_details.id) AS total'))
                    ->join('order_details', 'products.id', '=', 'order_details.product_id')
                    ->groupByRaw('products.id, products.name')
                    ->orderBy('total', 'DESC')
                    ->limit(10)->get();

        // $topProduct = DB::select('  SELECT p.name as name, count(od.id) AS total
        //                             FROM products p, order_details od
        //                             WHERE p.id = od.product_id
        //                             GROUP BY p.id, name
        //                             ORDER BY total DESC
        //                             LIMIT 10');
        $countUser = DB::table(DB::raw('users'))
                    ->select(DB::raw('roles.name AS name, count(users.id) AS countUser'))
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->join('roles', 'role_user.role_id', '=', 'roles.id')
                    ->groupByRaw('role_user.role_id, name')->get();

        // $countUser->toArray();
        // $countUser = User::select(DB::raw('roles.name AS name, count(users.id) AS countUser'))
        //             ->join('role_user', 'users.id', '=', 'role_user.user_id')
        //             ->join('roles', 'role_user.role_id', '=', 'roles.id')
        //             ->groupByRaw('role_user.role_id, name')->get();

        $total = DB::table(DB::raw('products'))
                        ->select(DB::raw('monthname(order_details.created_at) AS bulan,  round(SUM(order_details.price * order_details.qty * (100 - order_details.discount)/ 100),2) AS total'))
                        ->join('order_details', 'products.id', '=', 'order_details.product_id')
                        ->orderBy('order_details.created_at', 'ASC')
                        ->groupByRaw('bulan')->pluck('total');

        $bulan = DB::table(DB::raw('products'))
                        ->select(DB::raw('monthname(order_details.created_at) AS bulan, round(SUM(order_details.price * order_details.qty * (100 - order_details.discount)/ 100),2) AS total'))
                        ->join('order_details', 'products.id', '=', 'order_details.product_id')
                        ->whereRaw('YEAR(order_details.created_at) = 2022')
                        ->orderBy('order_details.created_at', 'ASC')
                        ->groupByRaw('bulan')->pluck('bulan');

        $data = " ";
        foreach($countUser as $user){
            $data.= "['".$user->name."', ".$user->countUser."],";
        }

        return view('admin.dashboard', compact('stores', 'categories', 'users', 'products', 'total', 'bulan', 'data', 'topUser', 'topProduct'));
    }
}
