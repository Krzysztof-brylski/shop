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



Route::middleware(['auth','verified'])->group(function (){
    Route::middleware('can:isAdmin')->group(function (){
        Route::resource('products',ProductsController::class)->parameters(
            ['products'=>'Products']
        );
        Route::get('/users/list',[UserController::class,'index'])->name('user.index');
        Route::delete('/users/{user}',[UserController::class,'destroy']);
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Auth::routes(['verify' => true]);


