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

Route::group(['prefix' => 'manage', "middleware" => "admin"], function() {
    Route::get('/', 'AdminController@index');

    Route::get("/users", "UserController@index");
    Route::get("/users/create", "UserController@create");
    Route::post("/users/store","UserController@store");
    Route::delete("/users/destroy/{id}", "UserController@destroy");
    Route::put("/users/update/{id}","UserController@update");

    Route::get("/customers", "CustomerController@index");
    Route::get("/customers/create", "CustomerController@create");
    Route::post("/customers/store","CustomerController@store");
    Route::delete("/customers/destroy/{id}", "CustomerController@destroy");
    Route::put("/customers/update/{id}","CustomerController@update");

    Route::get("/providers", "ProviderController@index");
    Route::get("/providers/create", "ProviderController@create");
    Route::post("/providers/store","ProviderController@store");
    Route::delete("/providers/destroy/{id}", "ProviderController@destroy");
    Route::put("/providers/update/{id}","ProviderController@update");

    Route::get("/categories", "CategoryController@index");
    Route::get("/categories/create", "CategoryController@create");
    Route::post("/categories/store","CategoryController@store");
    Route::delete("/categories/destroy/{id}", "CategoryController@destroy");
    Route::put("/categories/update/{id}","CategoryController@update");

    Route::get("/products", "ProductController@index");
    Route::get("/products/create", "ProductController@create");
    Route::post("/products/store","ProductController@store");
    Route::delete("/products/destroy/{id}", "ProductController@destroy");
    Route::put("/products/update/{id}","ProductController@update");

    Route::get('statistic','AdminController@statisticIndex');
    Route::get('billstatistic','AdminController@billStatistic');
   
    Route::get("/bills", "BillController@index");
    Route::get("/billdetail/{id}", "BillController@getBillDetail");
});

    Route::get('/','ClientController@index');
    Route::get('login','LoginController@getLogin');
    Route::post('login','LoginController@postLogin');

    Route::get('register','LoginController@getRegister');
    Route::post('register','LoginController@postRegister');

    Route::get('logout', 'LoginController@logout');

    Route::get('cart','ClientController@getCart');
    Route::get('add-to-cart/{id}', 'ClientController@addToCart');
    Route::get('remove-from-cart/{id}', 'ClientController@removeFromCart');
    Route::put('addAddress','ClientController@addAddress');
    Route::put('updateAddress/{id}','ClientController@updateAddress');

    Route::get('categories/{id}','ClientController@getProductByCategory');
    Route::get('bills/{id}','ClientController@getbill');

    Route::get('productdetail/{id}','ClientController@getProductDetail');
    Route::get('buynow/{id}', 'ClientController@buy');

    Route::post('order','ClientController@postBill');

    