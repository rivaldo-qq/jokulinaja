<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\productGalleryController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Checkoutcontroller;
use App\Http\Controllers\DashboardproductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');
Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])
->name('categories');
Route::get('/categories/{id}', [App\Http\Controllers\CategoriesController::class, 'detail'])
->name('categories-detail');
Route::get('/detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])
->name('detail');
Route::post('/detail/{id}', [App\Http\Controllers\DetailController::class, 'add'])
->name('detail-add');
Route::get('/sukses', [App\Http\Controllers\CartController::class, 'sukses'])
->name('sukses');
Route::post('/checkout/callback', [App\Http\Controllers\Checkoutcontroller::class, 'callback'])
->name('midtrans-callback');
Route::get('/register/sukses', [App\Http\Controllers\Auth\RegisterController::class, 'sukses'])
->name('register-sukses');


Route::group(['middleware' => ['auth']], function(){

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])
    ->name('cart');
    Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])
    ->name('cart-delete');


    Route::post('/checkout', [App\Http\Controllers\Checkoutcontroller::class, 'process'])
    ->name('checkout');


    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboard');


    Route::get('/dashboard/products', [App\Http\Controllers\DashboardproductController::class, 'index'])
    ->name('dashboard-product');
    Route::get('/dashboard/products/create', [App\Http\Controllers\DashboardproductController::class, 'create'])
    ->name('dashboard-product-create');
    route::post('/dashboard/products', [App\Http\Controllers\DashboardproductController::class, 'store'])
    ->name('dashboard-product-store');
    Route::get('/dashboard/products/{id}', [App\Http\Controllers\DashboardproductController::class, 'details'])
    ->name('dashboard-product-details');
    Route::post('/dashboard/products/{id}', [App\Http\Controllers\DashboardproductController::class, 'update'])
    ->name('dashboard-product-update');


    Route::post('/dashboard/products/gallery/upload', [App\Http\Controllers\DashboardproductController::class, 'uploadGallery'])
    ->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/products/gallery/delete{id}', [App\Http\Controllers\DashboardproductController::class, 'deleteGallery'])
    ->name('dashboard-product-gallery-delete');


    Route::get('/dashboard/transaksi', [App\Http\Controllers\DasboardTransactionController::class, 'index'])
    ->name('dashboard-transaction');
    Route::get('/dashboard/transaksi/{id}', [App\Http\Controllers\DasboardTransactionController::class, 'details'])
    ->name('dashboard-transaction-details');
    Route::get('/dashboard/transaksi/buy/{id}', [App\Http\Controllers\DasboardTransactionController::class, 'detailsbuy'])
    ->name('dashboard-transaction-details-buy');
    Route::post('/dashboard/transaksi/{id}', [App\Http\Controllers\DasboardTransactionController::class, 'update'])
    ->name('dashboard-transaction-update');


    Route::get('/dashboard/settings', [App\Http\Controllers\DashboardSettingController::class, 'store'])
    ->name('dashboard-settings-store');
    Route::get('/dashboard/account', [App\Http\Controllers\DashboardSettingController::class, 'account'])
    ->name('dashboard-settings-account');
    Route::post('/dashboard/account/{redirect}', [App\Http\Controllers\DashboardSettingController::class, 'update'])
    ->name('dashboard-settings-redirect');

});

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->Group(function(){
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');
        Route::resource('category', CategoryController::class);
        Route::resource('user', userController::class);
        Route::resource('product', productController::class);
        Route::resource('product-gallery', productGalleryController::class);
        Route::resource('transaction', TransactionController::class);
    });

Auth::routes();


