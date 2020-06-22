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

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin', 'operator']], function () {
});

Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
		Route::group(['prefix' => 'user', 'as' => '.user'], function () {
			Route::get('/', 'UserController@index')->name('.index');
			Route::get('/create', 'UserController@create')->name('.create');
			Route::post('/store', 'UserController@store')->name('.store');
			Route::get('/verif/{id}', 'UserController@verif')->name('.verif');
		});
		Route::group(['prefix' => 'menu', 'as' => '.menu'], function () {
			Route::get('/', 'MenuController@index')->name('.index');
			Route::get('/priv/{id}', 'MenuController@priv')->name('.set_priv');
			Route::get('/create', 'MenuController@create')->name('.create');
			Route::post('/store', 'MenuController@store')->name('.store');
			Route::get('/destroy/{id}', 'MenuController@destroy')->name('.destroy');
			Route::post('/update/{id}', 'MenuController@update')->name('.update');
		});
		Route::get('/', 'AdminController@index')->name('.home');
	});
});

Route::get('generate/{mains}/index', 'GeneratorController@index');
Route::get('generate/{submains}/index', 'GeneratorController@index');