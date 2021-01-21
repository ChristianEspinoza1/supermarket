<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;

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
/*
Route::get('/usuarios', function () {
    return view('Usuarios.index');
});

Route::get('/usuarios/create',[UsuarioController::class,'create']);
*/
Route::resource('usuario',UsuarioController::class)->middleware('auth');
Route::resource('producto',ProductoController::class)->middleware('auth');

Auth::routes(['reset'=>false]);

Route::get('/home', [UsuarioController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [UsuarioController::class, 'index'])->name('home');

});
