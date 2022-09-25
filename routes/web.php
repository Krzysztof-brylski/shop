<?php
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
Route::get('/users/list',[UserController::class,'index'])->middleware('auth');
Route::delete('/users/{user}',[UserController::class,'destroy'])->middleware('auth');

// product routing

Route::get('/products/list',[ProductsController::class,'index'])->name('products.index')->middleware('auth');
Route::get('/products/create',[ProductsController::class,'create'])->name('products.create')->middleware('auth');
Route::post('/products/store',[ProductsController::class,'store'])->name('products.store')->middleware('auth');
Route::get('/products/edit/{products}',[ProductsController::class,'edit'])->name('products.edit')->middleware('auth');
Route::post('/products/update/{products}',[ProductsController::class,'update'])->name('products.update')->middleware('auth');
Route::get('/products/show/{products}',[ProductsController::class,'show'])->name('products.show')->middleware('auth');
Route::delete('/products/{products}',[ProductsController::class,'destroy'])->name('products.destroy')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
