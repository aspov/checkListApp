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

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::resource('/admins', 'Admin\AdminController')
        ->parameters(['admins' => 'user'])->middleware('role:super-admin');
    Route::resource('/users', 'Admin\UserController')->middleware('role:super-admin|admin');
    Route::resource('/check_lists', 'Admin\CheckListController')->middleware('role:super-admin|admin');
});

Route::middleware(['auth', 'status'])->group(function () {
    Route::view('/my/account/blocked', 'my_account.block')->name('block');
    Route::resource('/my/account', 'MyAccountController')->except(['create', 'store']);
    Route::resource('/check_lists', 'CheckListController');
    Route::resource('/check_lists.check_list_item', 'CheckListItemController')->only(['store', 'update', 'destroy']);
});
