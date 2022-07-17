<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AdminCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        // -- MONTHLY CATEGORY YEAR
        // SELECT monthname(od.created_at) AS bulan, YEAR(od.created_at) AS Tahun,  c.name AS name,
        // 	   round(SUM(od.price * od.qty * (100 - od.discount)/ 100),2) AS total
        // FROM order_details od, categories c, products p
        // WHERE p.id = od.product_id
        // AND p.category_id = c.id
        // GROUP BY c.id, MONTH(od.created_at), tahun
        // ORDER BY tahun, MONTH(od.created_at);

        $categories = AdminCategory::get();

        $revenue = Category::join('products', 'products.category_id', '=', 'categories.id')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->select(DB::raw('monthname(order_details.created_at) AS bulan, YEAR(order_details.created_at) AS tahun,
                             categories.name AS name,
                     	     round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->groupByRaw('categories.id, MONTH(order_details.created_at), tahun')
            ->orderBy(DB::raw('tahun, MONTH(order_details.created_at)'))->get();

        return view('admin.category.index', compact('categories', 'revenue'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $image = time() . '-' . $request->image->getClientOriginalName();
        $request->image->move('image\admin\category', $image);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $image,
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $categories = AdminCategory::whereId($id)->first();
        $name = AdminCategory::whereId($id)->select('name')->pluck('name');
        $total2022 = Category::select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name,
                                              round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', 2022)
            ->groupByRaw('categories.id, MONTH(order_details.created_at)')
            ->orderBy('order_details.created_at', 'ASC')->pluck('total');

        $bulan2022 = DB::table(DB::raw('products'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', '=', 2022)
            ->orderBy('order_details.created_at', 'ASC')
            ->groupByRaw('categories.id, bulan')->pluck('bulan');

        $total2021 = Category::select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name,
                        round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', 2021)
            ->groupByRaw('categories.id, MONTH(order_details.created_at)')
            ->orderBy('order_details.created_at', 'ASC')->pluck('total');

        $bulan2021 = DB::table(DB::raw('products'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', '=', 2021)
            ->orderBy('order_details.created_at', 'ASC')
            ->groupByRaw('categories.id, bulan')->pluck('bulan');

        $total2020 = Category::select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name,
            round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', 2020)
            ->groupByRaw('categories.id, MONTH(order_details.created_at)')
            ->orderBy('order_details.created_at', 'ASC')->pluck('total');

        $bulan2020 = DB::table(DB::raw('products'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', '=', 2020)
            ->orderBy('order_details.created_at', 'ASC')
            ->groupByRaw('categories.id, bulan')->pluck('bulan');

        $total2019 = Category::select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name,
                            round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', 2019)
            ->groupByRaw('categories.id, MONTH(order_details.created_at)')
            ->orderBy('order_details.created_at', 'ASC')->pluck('total');

        $bulan2019 = DB::table(DB::raw('products'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', '=', 2019)
            ->orderBy('order_details.created_at', 'ASC')
            ->groupByRaw('categories.id, bulan')->pluck('bulan');

        $total2018 = Category::select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name,
                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', 2018)
            ->groupByRaw('categories.id, MONTH(order_details.created_at)')
            ->orderBy('order_details.created_at', 'ASC')->pluck('total');

        $bulan2018 = DB::table(DB::raw('products'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', '=', 2018)
            ->orderBy('order_details.created_at', 'ASC')
            ->groupByRaw('categories.id, bulan')->pluck('bulan');

        $total2017 = Category::select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name,
                                round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', 2017)
            ->groupByRaw('categories.id, MONTH(order_details.created_at)')
            ->orderBy('order_details.created_at', 'ASC')->pluck('total');

        $bulan2017 = DB::table(DB::raw('products'))
            ->select(DB::raw('monthname(order_details.created_at) AS bulan,  categories.name AS name, round(SUM(order_details.price * order_details.qty),2) AS total'))
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 'Finished')
            ->where('categories.id', $id)
            ->WhereYear('order_details.created_at', '=', 2017)
            ->orderBy('order_details.created_at', 'ASC')
            ->groupByRaw('categories.id, bulan')->pluck('bulan');

        // dd($total);

        return view('admin.category.show', compact('categories', 'name', 'total2020', 'bulan2020', 'total2021', 'bulan2022', 'total2022', 'bulan2021', 'total2019', 'bulan2019', 'total2018', 'bulan2018', 'total2017', 'bulan2017'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = AdminCategory::select('id', 'image', 'name')->find($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        $category = Category::whereId($id)->first();

        if ($request->image) {

            File::delete('image/admin/category/' . $category->image);

            $image =  time() . '-' . $request->image->getClientOriginalName();
            $request->image->move('image\admin\category', $image);

            $data['image'] = $image;
        }

        $category->update($data);

        Alert::success('Success', 'Data berhasil diperbaharui');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function confirm($id)
    {
        alert()->question('Perhatian!', 'Apa kamu yakin ingin menghapus?')
            ->showConfirmButton('<a href="/admin-foresell/list/category/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
            ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin-foresell/list/category');
    }

    public function delete($id)
    {
        $category = AdminCategory::whereId($id)->firstOrFail();
        File::delete('image/admin/category/' . $category->image);
        $category->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin-foresell/list/category');
    }
}
