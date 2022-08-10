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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/about', function () {
//     return 'hello world!';
// });
// Route::get('/contact', function () {
//     return 'call us!';
// });

Route::get('/', [App\Http\Controllers\PrincipalController::class, 'principal']);

Route::get('/about', [App\Http\Controllers\AboutController::class, 'about']);

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact']);

Route::get('/contact/{name}/{category_id}/{subject?}', [App\Http\Controllers\ContactController::class, 'parameters'])
    ->where('name', '[a-zA-Z]+')
    ->where('category_id', '[0-9]+');
