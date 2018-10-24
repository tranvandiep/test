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

Route::get('/', [
		'as'   => 'home-page',
		'uses' => 'FrontendController@showHome'
	]);

Route::get('/san-pham', [
		'as'   => 'products',
		'uses' => 'FrontendController@showProduct'
	]);

Route::get('/chi-tiet-san-pham/{id}', [
		'as'   => 'detail',
		'uses' => 'FrontendController@showDetail'
	]);

Route::group(['middleware' => 'auth'], function () {
	});
