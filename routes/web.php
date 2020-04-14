<?php

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
    return view('welcome');
});


Route::get('boutique', 'ProduitController@index')->name('products.index');
Route::get('boutique/{slug}', 'ProduitController@show')->name('products.show');

/* Panier */

Route::post('panier/ajouter', 'CartController@store')->name('cart.store');
Route::get('panier', 'CartController@index')->name('cart.index');
Route::patch('/panier/{rowId}', 'CartController@update')->name('cart.update');
Route::delete('panier/{rowId}', 'CartController@destroy')->name('cart.destroy');

Route::get('/vide', function () {
    Cart::destroy();
});
