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
Auth::routes();


Route::get('/home', 'HomeController@index');

//user
Route::get('user/home', 'userControler@showProducts');
Route::get('user/view-history','userControler@history');
Route::get('user/session/add_to_cart/{id}','userControler@AddToCart');
Route::get('user/session/save_DB','userControler@saveToTableSession');
Route::get('user/session/get_session','userControler@getFromSession');

// admin
Route::get('admin/home', 'adminControler@showProducts');
Route::get('admin/insert_page', 'adminControler@insert_page');
Route::post('admin/add/save','adminControler@add');
Route::get('admin/edit/{id}','adminControler@view_edit');
Route::post('admin/edit/save/{id}','adminControler@edit');
Route::get('admin/delete/{id}','adminControler@delete');
