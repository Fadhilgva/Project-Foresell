<?php

use App\Models\Product;
use Nette\Schema\Expect;
use GuzzleHttp\Middleware;

// CUSTOMER

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\OrdersCustController;
use App\Http\Controllers\LoginController;

//ADMIN TOKO
use App\Http\Controllers\StoreController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataOrderController;
use App\Http\Controllers\DataProdukController;


// ADMIN
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\TambahDiskonController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminTokoHomeController;
use App\Http\Controllers\DataPenjualanController;
use App\Http\Controllers\AdminTokoLoginController;
use App\Http\Controllers\AdminTokoRegisterController;
use App\Http\Controllers\SelesaikanPesananController;
use App\Http\Controllers\Auth\RegisteredTokoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredAdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//----------------------------------------------------------------------------------------------------
/*
* CUSTOMER
*
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{product:slug}', [ProductController::class, 'show']);

Route::get('/allcategories', [CategoryController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'show']);

Route::get('/stores', [StoreController::class, 'index']);

Route::group(
    ['middleware' => ['guest']],
    function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'index'])->name('login');

        Route::post('/login', [AuthenticatedSessionController::class, 'authenticate']);
        Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);

        Route::get('/register', [RegisteredUserController::class, 'create']);
        Route::post('/register', [RegisteredUserController::class, 'store']);

        //REGISTER ADMIN
        Route::get('/admin-foresell/register', [RegisteredAdminController::class, 'create'])->name('foresell.create');
        Route::post('/admin-foresell/register', [RegisteredAdminController::class, 'store'])->name('foresell.store');

        //LOGIN ADMIN
        Route::get('/admin-foresell/login', [AdminAuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('/admin-foresell/login', [AdminAuthenticatedSessionController::class, 'store'])->name('admin.login.store');

        //CRUD Login ADMIN TOKO
        Route::get('/admin_toko/login_store', [AdminTokoLoginController::class, 'index']);
        Route::post('/admin_toko/login_store', [AdminTokoLoginController::class, 'store'])->name('store.login');

        //CRUD Register ADMIN TOKO
        Route::get('/admin_toko/register_store', [AdminTokoRegisterController::class, 'index'])->name('store.index');
        Route::post('/admin_toko/register_store', [AdminTokoRegisterController::class, 'store'])->name('store.store');
    }
);

Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/profile', [UserController::class, 'index']);
        Route::get('/edit/profile', [UserController::class, 'edit']);
        Route::post('/edit/profile', [UserController::class, 'update']);
        Route::get('/wishlist', [WishlistController::class, 'index']);
        Route::post('/add', [WishlistController::class, 'store']);
        Route::post('/delete_wishlist', [WishlistController::class, 'destroy']);
        Route::get('/cart', [CartController::class, 'index']);
        Route::post('/add_cart/{product:id}', [CartController::class, 'store']);
        Route::post('/add_cartproduct/{product:id}', [CartController::class, 'storeproduct']);
        Route::post('/delete_cart', [CartController::class, 'destroy']);
        Route::post('/update_cart', [CartController::class, 'updatecart']);
        Route::get('/shipping', [OrdersCustController::class, 'index']);
        Route::post('/editshipping', [OrdersCustController::class, 'updateaddress']);
        Route::get('/billing', [OrdersCustController::class, 'billing']);
        Route::post('/billing', [OrdersCustController::class, 'storebilling']);
        Route::get('/completed', [OrdersCustController::class, 'completed']);
        Route::get('/orders', [OrdersCustController::class, 'showorders']);
        Route::get('/orders/{orders:id}/confirm', [OrdersCustController::class, 'confirm']);
        Route::post('/orders/{orders:id}/delete', [OrdersCustController::class, 'delete']);
        Route::post('/orders/{orders:id}/update', [OrdersCustController::class, 'update']);
        Route::get('/orderdetails/{order:id}', [OrdersCustController::class, 'showordersdetails']);
    }
);

//----------------------------------------------------------------------------------------------------
/*
* ADMIN TOKO
*
*/

Route::middleware(['auth', 'role:adminToko'])->group(function () {
    //CRUD Login
    Route::get('/admin_toko/profile', [ProfileController::class, 'index']);
    Route::get('/admin_toko/editprofile', [ProfileController::class, 'create']);
    Route::post('/admin_toko/editprofile/{store:id}', [ProfileController::class, 'update']);

    //CRUD Home
    Route::get('/admin_toko/home_store', [AdminTokoHomeController::class, 'index'])->name('store.home');

    //CRUD Data Produk
    //Create
    Route::get('/admin_toko/data_produk/create', [DataProdukController::class, 'create']); //Route menuju form create
    Route::get('/admin_toko/data_produk/checkSlug', [DataProdukController::class, 'checkSlug']); //Route menuju form create
    Route::post('/admin_toko/data_produk/{id}', [DataProdukController::class, 'store']); //Route untuk menyimpan data ke database
    //Read
    Route::get('/admin_toko/data_produk', [DataProdukController::class, 'index']); //Route List data produk
    Route::get('/admin_toko/data_produk/{data_produk_id}', [DataProdukController::class, 'show']); //Route detail data produk
    //Update
    Route::get('/admin_toko/data_produk/{data_produk_id}/edit', [DataProdukController::class, 'edit']); //Route menuju ke form edit
    Route::put('/admin_toko/data_produk/{data_produk_id}', [DataProdukController::class, 'update']); //Route untuk update data berdasarkan id di database
    //Delete
    // Route::delete('/admin_toko/data_produk/{data_produk_id}', [DataProdukController::class, 'destroy']);//Route untuk hapus data di database
    Route::get('/admin_toko/data_produk/{id}/confirm', [DataProdukController::class, 'confirm']);
    Route::get('/admin_toko/data_produk/{id}/delete', [DataProdukController::class, 'delete']);



    // //CRUD Kategori
    // Route::get('/admin_toko/kategori', [KategoriController::class, 'index']);
    // Route::get('/admin_toko/kategori/create', [KategoriController::class, 'create']);
    // Route::get('/admin_toko/kategori/edit', [KategoriController::class, 'edit']);

    //CRUD Data Order
    Route::get('/admin_toko/data_order', [DataOrderController::class, 'index']);
    Route::get('/admin_toko/data_order/create', [DataOrderController::class, 'create']);

    //CRUD Selesaikan Pesanan
    Route::get('/admin_toko/selesaikan_pesanan', [SelesaikanPesananController::class, 'index']);

    //CRUD Data Order
    Route::get('/admin_toko/data_order', [DataOrderController::class, 'index']);
    Route::get('/admin_toko/data_order/create', [DataOrderController::class, 'create']);

    //CRUD Data Penjualan
    Route::get('/admin_toko/data_penjualan', [DataPenjualanController::class, 'index']);

    //CRUD Tambah Diskon
    Route::get('/admin_toko/tambah_diskon', [TambahDiskonController::class, 'index']);
    Route::get('/admin_toko/tambah_diskon/edit', [TambahDiskonController::class, 'edit']);
});




//----------------------------------------------------------------------------------------------------
/*
* ADMIN FORESELL
*
*/

Route::group(['middleware' => ['auth', 'role:adminForesell']], function () {

    Route::get('/admin-foresell/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin-foresell/dashboard', [AdminAuthenticatedSessionController::class, 'store'])->name('admin.dashboard.store');

    // USER
    Route::get('/admin-foresell/list/users', [AdminUserController::class, 'index']);
    Route::get('/admin-foresell/list/users/{id}/show', [AdminUserController::class, 'show']);
    Route::get('/admin-foresell/list/users/{id}/confirm', [AdminUserController::class, 'confirm']);
    Route::get('/admin-foresell/list/users/{id}/delete', [AdminUserController::class, 'delete']);

    // ORDER
    Route::get('/orders-payment-status', [OrdersController::class, 'statusPayment']);
    Route::get('/orders-ship-status', [OrdersController::class, 'statusShip']);

    // TOKO
    Route::get('/admin-foresell/list/toko', [TokoController::class, 'index']);
    Route::get('/admin-foresell/list/toko/{id}/show', [TokoController::class, 'show']);
    Route::get('/admin-foresell/list/toko/{id}/confirm', [TokoController::class, 'confirm']);
    Route::get('/admin-foresell/list/toko/{id}/delete', [TokoController::class, 'delete']);

    // CATEGORY
    Route::resource('/admin-foresell/list/category', AdminCategoryController::class);
    Route::get('/admin-foresell/list/category/{id}/confirm', [AdminCategoryController::class, 'confirm']);
    Route::get('/admin-foresell/list/category/{id}/show', [AdminCategoryController::class, 'show']);
    Route::get('/admin-foresell/list/category/{id}/delete', [AdminCategoryController::class, 'delete']);


    // PAYMENT
    Route::resource('/admin-foresell/list/payment', PaymentController::class);
    Route::get('/admin-foresell/list/payment/{id}/confirm', [PaymentController::class, 'confirm']);
    Route::get('/admin-foresell/list/payment/{id}/delete', [PaymentController::class, 'delete']);

    // Kurir
    Route::resource('admin-foresell/list/couriers', CourierController::class);
    Route::get('/admin-foresell/list/couriers/{id}/confirm', [CourierController::class, 'confirm']);
    Route::get('/admin-foresell/list/couriers/{id}/delete', [CourierController::class, 'delete']);
    Route::post('/getKabupaten', [CourierController::class, 'getKabupaten'])->name('getKabupaten');
    Route::post('/getKecamatan', [CourierController::class, 'getKecamatan'])->name('getKecamatan');
});

require __DIR__ . '/auth.php';
