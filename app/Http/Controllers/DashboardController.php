<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\AdminCategory;
use App\Models\OrderDetails;
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

        // SELECT u.name AS name, count(u.id) AS total
        // FROM users u, orders o, order_details od
        // WHERE u.id = o.user_id
        // AND od.order_id = o.id
        // AND o.status = 'Finished'
        // GROUP BY u.id
        // ORDER BY total DESC
        // LIMIT 10

        $topUser = User::select(DB::raw('users.id AS id, users.name AS name, count(users.id) AS total'))
            ->join('orders', 'orders.user_id', '=', 'users.id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->groupByRaw('users.id')
            ->orderBy('total', 'DESC')
            ->limit(10)->get();

        $topProduct = Product::select(DB::raw('products.image AS image, products.id AS id, products.name, sum(order_details.qty) AS total'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->groupByRaw('products.id, products.name')
            ->orderBy('total', 'DESC')
            ->limit(10)->get();


        $countUser = DB::table(DB::raw('users'))
            ->select(DB::raw('roles.name AS name, count(users.id) AS countUser'))
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->groupByRaw('role_user.role_id, name')->get();

        $total = OrderDetails::select(DB::raw('monthname(order_details.created_at) AS bulan,
                                               round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->whereYear('order_details.created_at', '=', 2022)
            ->where('orders.status', '=', 'Finished')
            ->orderBy('order_details.created_at', 'ASC')
            ->groupByRaw('bulan, Year(order_details.created_at)')->pluck('total');

            // SELECT monthname(od.created_at) AS bulan, round(SUM(od.price * od.qty),2) AS total
            // FROM order_details od, orders o
            // WHERE od.order_id = o.id
            // AND o.status = "Finished"
            // AND YEAR(od.created_at) = 2022
            // GROUP BY MONTH(od.created_at), YEAR(od.created_at);
        $bulan = OrderDetails::select(DB::raw('monthname(order_details.created_at) AS bulan,
        round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->whereYear('order_details.created_at', '=', 2022)
            ->where('orders.status', '=', 'Finished')
            ->orderBy('order_details.created_at', 'ASC')
            ->groupByRaw('bulan, Year(order_details.created_at)')->pluck('bulan');

        $data = " ";
        foreach ($countUser as $user) {
            $data .= "['" . $user->name . "', " . $user->countUser . "],";
        }

        return view('admin.dashboard', compact('stores', 'categories', 'users', 'products', 'total', 'bulan', 'data', 'topUser', 'topProduct'));
    }
}
