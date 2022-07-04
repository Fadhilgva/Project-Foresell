<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function index()
    {

        $categories = DB::select("SELECT name, slug, created_at, image FROM categories;");
        return view('admin.category.index', compact("categories"));
    }
}
