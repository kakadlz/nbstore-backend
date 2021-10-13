<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\productcontroller;

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
Route::get('/', [Dashboardcontroller::class, 'index'])->name('dashboard');


Auth::routes(['register'=>false]);

Route::get('/products', [productcontroller::class, 'index'])->name('products');
Route::get('/productscreate', [productcontroller::class, 'create'])->name('products.create');
Route::post('/products', [productcontroller::class, 'store'])->name('products.store');
Route::get('/products/{id}', [productcontroller::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [productcontroller::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [productcontroller::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [productcontroller::class, 'destroy'])->name('products.delete');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
