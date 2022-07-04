<?php

use App\Models\Product;
use Nette\Schema\Expect;
use GuzzleHttp\Middleware;

// CUSTOMER

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoreController;

//ADMIN TOKO
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
use App\Http\Controllers\LoginAdminController;


// ADMIN
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
    }
);


//----------------------------------------------------------------------------------------------------
/*
* ADMIN TOKO
*
*/
//CRUD Login
Route::get('/admin_toko/login_store', [AdminTokoLoginController::class,'index']);

//CRUD Register
Route::get('/admin_toko/register_store',[AdminTokoRegisterController::class, 'index']);

//CRUD Login
Route::get('/admin_toko/profile', [ProfileController::class, 'index']);
Route::get('/admin_toko/profile/create',[ProfileController::class, 'create']);

//CRUD Home
Route::get('/admin_toko/home_store',[AdminTokoHomeController::class, 'index']);

//CRUD Data Produk
// Route::get('/data_produk','DataProdukController@data_produk');
Route::get('/admin_toko/data_produk', [DataProdukController::class, 'index']);
Route::get('/admin_toko/data_produk/create',[DataProdukController::class, 'create']);
Route::get('/admin_toko/data_produk/edit', [DataProdukController::class, 'edit']);

//CRUD Data Produk
Route::get('/admin_toko/kategori',[KategoriController::class, 'index']);
Route::get('/admin_toko/kategori/create',[KategoriController::class, 'create']);
Route::get('/admin_toko/kategori/edit',[KategoriController::class, 'edit']);


//CRUD Selesaikan Pesanan
Route::get('/admin_toko/selesaikan_pesanan',[SelesaikanPesananController::class, 'index']);

//CRUD Data Order
Route::get('/admin_toko/data_order',[DataOrderController::class, 'index']);
Route::get('/admin_toko/data_order/create',[DataOrderController::class, 'create']);

//CRUD Data Penjualan
Route::get('/admin_toko/data_penjualan',[DataPenjualanController::class, 'index']);

//CRUD Tambah Diskon
Route::get('/admin_toko/tambah_diskon',[TambahDiskonController::class, 'index']);
Route::get('/admin_toko/tambah_diskon/edit',[TambahDiskonController::class, 'edit']);


//----------------------------------------------------------------------------------------------------
/*
* ADMIN FORESELL
*
*/

Route::group(['middleware' => ['auth', 'role:adminForesell']], function() {

    Route::get('/admin-foresell/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin-foresell/dashboard', [AdminAuthenticatedSessionController::class, 'store'])->name('admin.dashboard.store');

    // USER
    Route::get('/admin-foresell/list/users', [AdminUserController::class, 'index']);

    // ORDER
    Route::get('/orders-payment-status', [OrdersController::class, 'statusPayment']);
    Route::get('/orders-ship-status', [OrdersController::class, 'statusShip']);

    // TOKO
    Route::get('/admin-foresell/list/toko', [TokoController::class, 'index']);

    // CATEGORY
    Route::get('/admin-foresell/list/category', [AdminCategoryController::class, 'index']);

    // BANK
    Route::resource('/admin-foresell/list/bank', BankController::class);
    Route::get('/admin/list/bank/{id}/confirm', [BankController::class, 'confirm']);
    Route::get('/admin/list/bank/{id}/delete', [BankController::class, 'delete']);

    // Kurir
    Route::resource('admin-foresell/list/kurir', KurirController::class);
    Route::post('/getKabupaten', [KurirController::class, 'getKabupaten'])->name('getKabupaten');
    Route::post('/getKecamatan', [KurirController::class, 'getKecamatan'])->name('getKecamatan');
});

require __DIR__.'/auth.php';
