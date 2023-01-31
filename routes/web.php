<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentsController;
use \App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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


Route::get('/',[WelcomeController::class,'index']);

// users routing



Route::middleware(['auth','verified'])->group(function (){
    Route::middleware('can:isAdmin')->group(function (){
        Route::get('/products/{Products}/download',[ProductsController::class,'downloadImage'])->name('products.downloadImage');
        Route::resource('products',ProductsController::class)->parameters(
            ['products'=>'Products']
        )->except('show');
        Route::get('/users/list',[UserController::class,'index'])->name('user.index');
        Route::get('/users/edit/{user}',[UserController::class,'edit'])->name('user.edit');
        Route::post('/users/edit/{user}',[UserController::class,'update'])->name('user.update');
        Route::delete('/users/{user}',[UserController::class,'destroy']);
    });
    Route::get('/cart/list', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{Products}', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/dell/{Products}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/products/{Products}', [ProductsController::class, 'show'])->name('products.show');

    Route::resource('order', OrderController::class)->except(['update','edit']);;

});

Route::post('payment/status/update/{Payments:token}',[PaymentsController::class,'updateStatus'])
    ->name('payment.status.update')->missing(function (){abort(403);});

Auth::routes(['verify' => true]);


