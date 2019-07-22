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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('temp', function () {
    return view('temp');
});


Route::resource('seller','SellerController');
Route::resource('buyer','BuyerController');
Route::resource('shipper','ShipperController');
Route::resource('buyerBank','BuyerBankController');
Route::resource('cnf','CnfController');
Route::resource('product','ProductController');
Route::resource('sellerBank','SellerBankController');


Route::get('logout', 'Auth\LoginController@logout');