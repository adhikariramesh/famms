<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\UserController;

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

Route::get('/',[HomeController::class, "home"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class, "index"]);
Route::get('/view_category',[adminController::class, "view_category"]);
Route::post('/add_category',[adminController::class, "addCategory"]);
Route::get('/delete_category/{id}',[adminController::class, "deleteCategory"]);
Route::get('/edit_category/{id}',[adminController::class, "editCategory"]);
Route::post('/update_category/{id}',[adminController::class, "updateCategory"]);

Route::get('/add_product',[adminController::class, "addProduct"]);
Route::post('/add_product',[adminController::class, "addProductDb"]);
Route::get('/show_product',[adminController::class, "showProduct"]);
Route::get('/delete_product/{id}',[adminController::class, "deleteProduct"]);

Route::get('/edits_product/{id}',[adminController::class, "editsProduct"]);



Route::post('/subscribe', [UserController::class, "subscribe"]);
