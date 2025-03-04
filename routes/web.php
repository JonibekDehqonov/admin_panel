<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('products.index');
// });

Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/register',[AuthController::class, 'register_store'])->name('register.store');
Route::post('/login',[AuthController::class, 'authenticate'])->name('authenticate');




Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::get('products/create',[ProductController::class, 'create'])->name('products.create');
});



