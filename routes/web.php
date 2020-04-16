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
/* 
Route::get('/', function () {
    return view('welcome');
}); */

/*Gestion de Produits */
Route::get('/', 'ProduitController@index')->name('products.index');
Route::get('boutique/{slug}', 'ProduitController@show')->name('products.show');
Route::get('search','ProduitController@search')->name('products.search');
/* Gestion Panier */

Route::group(['middleware' => 'auth'], function() {
    Route::post('panier/ajouter', 'CartController@store')->name('cart.store');
    Route::get('panier', 'CartController@index')->name('cart.index');
    Route::patch('/panier/{rowId}', 'CartController@update')->name('cart.update');
    Route::delete('panier/{rowId}', 'CartController@destroy')->name('cart.destroy');
});


/*Gestion de commande */
Route::group(['middleware' => 'auth'], function() {
    Route::post('command', 'CommandController@store')->name('command.store');
});

/*Gestion de administrateur*/
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
