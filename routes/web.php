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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('about', ['uses' => 'AboutController@index', 'as' => 'about']);
Route::get('products', ['uses' => 'ProductsController@index', 'as' => 'products']);
Route::get('agency', ['uses' => 'AgencyController@index', 'as' => 'agency']);
Route::get('contact', ['uses' => 'ContactController@index', 'as' => 'contact']);
Route::post('contact', ['uses' => 'ContactController@contacting', 'as' => 'contacting']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', function() { return redirect()->route('redirects.index'); });
    Route::resource('redirects', 'RedirectsController', ['except' => ['show'], 'parameters' => ['redirects' => 'id']]);
    // auth routes
    Route::get('login', ['uses' => 'Auth\LoginController@showLoginForm', 'as' => 'login']);
    Route::post('login', ['uses' => 'Auth\LoginController@login']);
    Route::get('logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'logout']);
});