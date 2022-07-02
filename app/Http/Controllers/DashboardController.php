<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\AdminCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

class DashboardController extends Controller
{
    public function index()
    {

        // $result = DB::select(DB::raw("SELECT monthname(created_at) as month, name, SUM(total) as total
        // FROM `categories`
        // GROUP BY month, name
        // ORDER BY month"));

        // $total = DB::select(DB::raw('SELECT total FROM categories ORDER BY month(created_at)'));
        // $month = DB::select(DB::raw('SELECT monthname(created_at) as month FROM categories GROUP BY month DESC'));
        // $category = DB::select(DB::raw('SELECT name FROM categories GROUP BY name DESC'));

        // $total = AdminCategory::select('total')->orderBy('created_at', 'ASC')->pluck('total');
        // $month = DB::select(DB::raw('SELECT monthname(created_at) as month FROM categories GROUP BY month DESC'));
        // $category = AdminCategory::select('name')->groupBy('name')->pluck('name');
        // dd($total);
        // dd($category);

        // $data = " ";
        // foreach ($result as $item) {
        //     $data.= "['".$item->month."','".$item->name."',".$item->total."],";
        // }

        // dd(gettype($total));

        // $category = Category::select('name')->pluck("name");

        // $total = Category::select(DB::raw("SUM(total) as total"))->GroupBy(DB::raw('MONTH(created_at)'))->pluck('total');

        // $month = Category::select(DB::raw("MONTHNAME(created_at) as month"))->GroupBy(DB::raw('month'))->pluck('month');


        return view('admin.dashboard');



    }
}

// $category = Category::select('name')->pluck("name");
// // dd($category);
// $total = Category::select(DB::raw("SUM(total) as total"))->GroupBy(DB::raw('MONTH(created_at)'))->pluck('total');
// // ->GroupBy(DB :: raw("Month(created_at)"))
// // ->pluck("total");
// //dd($total);
// $bulan = Category::select(DB::raw("MONTHNAME(created_at) as bulan"))->GroupBy(DB::raw('bulan'))->pluck('bulan');
// // dd($bulan);
// // $bulan = DB::select("SELECT monthname(created_at) as month FROM `categories` GROUP BY (month)");

// return view('admin.dashboard', compact('category', 'total', 'bulan'));
//         //return view('admin.dashboard');
