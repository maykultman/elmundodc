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
// Products
    Route::get('buscar/producto', 'ProductController@search')->name('buscar.producto');
    // ForceDeletes
        Route::get('productos/papelera','ProductController@papelera')->name('papelera');
        Route::get('productos/restore/{id}','ProductController@restore')->name('productos.restore');
        Route::delete('productos/{code}/forceDelete','ProductController@forceDelete')->name('productos.forceDelete');
    // EndForceDeletes
    Route::resource('productos','ProductController')
    ->parameters(['productos'=>'product'])->names('productos');
// End products

Route::resource('sucursales','BranchController');
Route::resource('caja','CajaController');

Route::resource('sales','SaleController')
->parameters(['sales'=>'sale'])->names('sales');



Route::resource('usuarios','UserController')
->parameters(['usuarios'=>'user'])->names('usuarios');

Route::resource('proveedores','ProviderController')
->parameters(['proveedores'=>'provider'])->names('proveedores');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
