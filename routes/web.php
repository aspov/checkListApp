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


Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::resource('/my/account', 'MyAccountController')->except(['create', 'store']);
Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::resource('/admins', 'Admin\AdminController')->middleware('role:super-admin');
    Route::resource('/users', 'Admin\UserController')->middleware('role:super-admin|admin');
    Route::resource('/check_lists', 'Admin\CheckListController')->middleware('role:super-admin|admin');
});
Route::resource('/check_lists', 'CheckListController');
Route::resource('/check_lists.check_list_item', 'CheckListItemController')->only(['create', 'update', 'destroy']);
