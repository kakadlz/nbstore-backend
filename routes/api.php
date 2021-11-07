<?php

use App\Http\Controllers\API\apicheckoutscontroller;
use App\Http\Controllers\API\apiproductscontroller;
use App\Http\Controllers\API\apitransactionscontroller;
use App\Http\Controllers\API\ResponseFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', [apiproductscontroller::class, 'all'])->name('api.products.index');
Route::post('/checkout', [apicheckoutscontroller::class, 'checkout'])->name('api.checkout.checkout');
Route::get('/transactions/{id}', [apitransactionscontroller::class, 'get'])->name('api.transactions.get');


