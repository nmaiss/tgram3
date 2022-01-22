<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/action', 'App\Http\Controllers\ChannelController@action')->name('/.action');

//Route::get('/category/{name}', 'App\Http\Controllers\CategoryController@index');

Route::get('/add', 'App\Http\Controllers\AddController@index');

Route::post('/add/submit', 'App\Http\Controllers\ChannelController@submit');

Route::post('/category/store', 'App\Http\Controllers\CategoryController@store');
Route::get('/category/{id}/delete', 'App\Http\Controllers\CategoryController@delete');
Route::get('/category/{url}', 'App\Http\Controllers\CategoryController@index');

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin');

Route::any('/admin/accept', 'App\Http\Controllers\AdminController@accept');

Route::get('/admin/{id}/reject', 'App\Http\Controllers\AdminController@reject')->name('reject-channel');
