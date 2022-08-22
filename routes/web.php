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

Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/clients', [App\Http\Controllers\ClientsController::class, 'index'])->name('app.clients');
    Route::get('/suppliers', [App\Http\Controllers\SuppliersController::class, 'index'])->name('app.suppliers');
    Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('app.products');
});

Route::fallback(function () {
    return '<h2>Route not found</h2> <ul>
    <li> <a href="' . route('site.index') . '">Principal</a> </li>
    <li> <a href="' . route('site.about') . '">About</a> </li>
    <li> <a href="' . route('site.contact') . '">Contact</a> </li>
    <li> <a href="' . route('site.login') . '">Login</a> </li> </ul>';
});

// Route::get('/route1', function () {
//     return 'redirected to route 01';
// })->name('site.route1');

// // Route::redirect('/route2', '/route1');
// Route::get('/route2', function () {
//     return redirect()->route('site.route1');
// })->name('site.route2');
