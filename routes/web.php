<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PClienteController;
use App\Http\Controllers\CartController;
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

Route::get('/', function () {
    return view('auth.login');
});

//carrito

//Route::post('cart-add','CartController@add')->name('cart.add');
Route::post('/cart-add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart-checkout', [CartController::class, 'cart'])->name('cart.checkout');
Route::post('/cart-clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart-removeitem', [CartController::class, 'removeitem'])->name('cart.removeitem');

/*
Route::get('cart-checkout','CartController@cart')->name('cart.checkout');
Route::post('cart-clear','CartController@clear')->name('cart.clear');
Route::post('cart-removeitem','CartController@removeitem')->name('cart.removeitem');
*/

Route::resource('usuario',UsuarioController::class)->middleware('auth');
Route::resource('producto',ProductoController::class)->middleware('auth');
Route::resource('welcome',PClienteController::class);

Auth::routes(['reset'=>false]);

Route::get('/home', [UsuarioController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [UsuarioController::class, 'index'])->name('home');

});
