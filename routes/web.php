<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\productscontroller;
use App\Http\Controllers\productgalleriescontroller;
use App\Http\Controllers\transactioncontroller;

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


Auth::routes(['register'=>true]);


Route::get('/products', [productscontroller::class, 'index'])->name('products');
Route::get('/productscreate', [productscontroller::class, 'create'])->name('products.create');
Route::post('/products', [productscontroller::class, 'store'])->name('products.store');
Route::get('/products/{id}', [productscontroller::class, 'show'])->name('products.show');
Route::get('/products/{id}/gallery', [productscontroller::class, 'gallery'])->name('products.gallery');
Route::get('/products/{id}/edit', [productscontroller::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [productscontroller::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [productscontroller::class, 'destroy'])->name('products.delete');


Route::get('/productgalleries', [productgalleriescontroller::class, 'index'])->name('productgalleries');
Route::get('/productgalleriescreate', [productgalleriescontroller::class, 'create'])->name('productgalleries.create');
Route::post('/productgalleries', [productgalleriescontroller::class, 'store'])->name('productgalleries.store');
Route::get('/productgalleries/{id}', [productgalleriescontroller::class, 'show'])->name('productgalleries.show');
Route::get('/productgalleries/{id}/edit', [productgalleriescontroller::class, 'edit'])->name('productgalleries.edit');
Route::put('/productgalleries/{id}', [productgalleriescontroller::class, 'update'])->name('productgalleries.update');
Route::delete('/productgalleries/{id}', [productgalleriescontroller::class, 'destroy'])->name('productgalleries.delete');


Route::get('/transactions', [transactioncontroller::class, 'index'])->name('transactions.index');
Route::get('/transactions/show/{id}', [transactioncontroller::class, 'show'])->name('transactions.show');
Route::get('/transactions/edit/{id}', [transactioncontroller::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/edit/{id}/update', [transactioncontroller::class, 'update'])->name('transactions.update');
Route::delete('/transactions/delete/{id}', [transactioncontroller::class, 'destroy'])->name('transactions.delete');
Route::get('/transactions/setstatus/{id}', [transactioncontroller::class, 'setStatus'])->name('transactions.status');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/token', function (Request $request) {
    // $token = $request->session()->token();

    $token = csrf_token();

   return $token;
});
