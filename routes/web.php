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
    return redirect()->route('login');
});

Route::get('/login', 'Admin\AuthController@login')->name('login');
Route::post('/authenticate', 'Admin\AuthController@authenticate')->name('authenticate');
Route::post('/logout', 'Admin\AuthController@logout')->name('logout');
Route::group(['middleware' => 'auth_admin'], function () {
	Route::resource('dashboard', 'Admin\DashboardController')->except(['show']);
	Route::post('blocks/dat-cho', 'Api\TransactionController@datCho');
	Route::post('blocks/dat-coc', 'Api\TransactionController@datCoc')->name('blocks.dat_coc');
	Route::post('blocks/huy-coc', 'Api\TransactionController@huyCoc');
	Route::post('blocks/xac-nhan-coc', 'Api\TransactionController@xacNhanCoc');
	Route::get('/api/blocks/{id}', 'Api\TransactionController@getBlock');
	Route::get('/du-an', 'Admin\DuAnController@index')->name('du-an');
	Route::get('/du-an/{id}', 'Admin\DuAnController@show');
	Route::get('/', 'Admin\DashboardController@index');
});
// Route::get('/', 'Admin\DashboardController@index');
