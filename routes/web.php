<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('buscar/producto', 'ProductController@search')->name('buscar.producto');
// ForceDeletes
    Route::get('productos/papelera','ProductController@papelera')->name('papelera');
    Route::get('productos/restore/{id}','ProductController@restore')->name('productos.restore');
    Route::delete('productos/{code}/forceDelete','ProductController@forceDelete')->name('productos.forceDelete');
// EndForceDeletes

Route::resource('sucursales','BranchController');
Route::resource('productos','ProductController')
->parameters(['productos'=>'product'])->names('productos');





Route::resource('usuarios','UserController');
Route::resource('proveedores','ProviderController');
// Route::resource('formato', 'DocumentController')
// ->parameters(['formato'=> 'document'])
// ->names('formatos');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
