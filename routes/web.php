<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::post('/', [App\Http\Controllers\PrincipalController::class, 'post_principal'])->name('site.index');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'about'])->name('site.about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('site.contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'post_contact'])->name('site.contact');
Route::get('/login/{error?}', [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('site.login');

Route::middleware('auth.mid')->prefix('/app')->group(function () {
    Route::prefix('/supplier')->group(function () {
        Route::get('', [App\Http\Controllers\SupplierController::class, 'index'])->name('app.supplier.index');
        Route::get('/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('app.supplier.create');
        Route::post('/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('app.supplier.create');
        Route::get('/list', [App\Http\Controllers\SupplierController::class, 'list'])->name('app.supplier.list');
        Route::post('/list', [App\Http\Controllers\SupplierController::class, 'list'])->name('app.supplier.list');
        Route::get('/update/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('app.supplier.update');
        Route::post('/update/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('app.supplier.update');
        Route::get('/delete/{id}', [App\Http\Controllers\SupplierController::class, 'delete'])->name('app.supplier.delete');
    });
    
    Route::resource('product', 'App\Http\Controllers\ProductController');
    Route::resource('product_detail', 'App\Http\Controllers\ProductDetailController');

    Route::resource('/client', 'App\Http\Controllers\ClientController');
    Route::resource('/order', 'App\Http\Controllers\OrderController');

    Route::get('/order_product/create/{order}', [App\Http\Controllers\OrderProductController::class, 'create'])->name('order_product.create');
    Route::post('/order_product/store/{order}', [App\Http\Controllers\OrderProductController::class, 'store'])->name('order_product.store');
    Route::delete('/order_product/delete/{order_product}', [App\Http\Controllers\OrderProductController::class, 'destroy'])->name('order_product.destroy');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('app.logout');
});

Route::fallback(function () {
    return '
        <h2> Route not found </h2>
        <ul>
            <li> <a href="' . route('site.index') .   '">Principal </a> </li>
            <li> <a href="' . route('site.about') .   '">About     </a> </li>
            <li> <a href="' . route('site.contact') . '">Contact   </a> </li>
            <li> <a href="' . route('site.login') .   '">Login     </a> </li>
            <br><br><br>
            <li> <a href="' . route('app.home') .     '">Home      </a> </li>
        </ul>';
});

// Route::get('/route1', function () {
//     return 'redirected to route 01';
// })->name('site.route1');

// // Route::redirect('/route2', '/route1');
// Route::get('/route2', function () {
//     return redirect()->route('site.route1');
// })->name('site.route2');
