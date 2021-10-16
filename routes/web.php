<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();
//----------------Frontend Pages-----------------
Route::get('/', 'App\Http\Controllers\FrontpageController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\FrontpageController@index');
Route::get('/emergency', 'App\Http\Controllers\FrontpageController@emergency')->name('emergency');
Route::get('/casestatus', 'App\Http\Controllers\FrontpageController@casestatus')->name('casestatus');
Route::get('/complaint', 'App\Http\Controllers\FrontpageController@complaint')->name('complaint');
Route::get('/policestation', 'App\Http\Controllers\FrontpageController@policestation')->name('policestation');
Route::get('/hotline', 'App\Http\Controllers\FrontpageController@helpline')->name('helpline');
Route::get('/wantedcriminallist', 'App\Http\Controllers\FrontpageController@wantedlist')->name('wantedlist');


//----------------Admin Panel Pages-----------------
Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::resource('/admin/hotlines', 'App\Http\Controllers\HotlineController');
Route::get('/admin/hotlines', 'App\Http\Controllers\HotlineController@index')->name('hotline');
Route::post('/hotlines-add', 'App\Http\Controllers\HotlineController@store')->name('hotline.add');
Route::delete('/admin/hotlines/delete/{id}','App\Http\Controllers\HotlineController@destroy');



Route::resource('/category', 'App\Http\Controllers\CategoryController')->middleware('auth');
Route::get('/admin/category', 'App\Http\Controllers\CategoryController@index')->name('category');
Route::post('/category-add', 'App\Http\Controllers\CategoryController@store')->name('category.add');
Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.delete');
Route::get('/category-edit/{id}', 'App\Http\Controllers\CategoryController@edit');
Route::post('/category-update/{id}', 'App\Http\Controllers\CategoryController@update');
Route::get('/category/{id}/{catsts}','App\Http\Controllers\CategoryController@catstatus')->name('catstatus');

Route::resource('/police-station', 'App\Http\Controllers\PoliceStationController');
Route::get('/admin/police/station', 'App\Http\Controllers\PoliceStationController@index')->name('police.division');
Route::get('/admin/police/station/district/{id}', 'App\Http\Controllers\PoliceStationController@getdistrict')->name('police.district');
Route::get('/admin/police/station/upazila/{id}', 'App\Http\Controllers\PoliceStationController@getupazilla')->name('police.upazila');
Route::post('/admin/police/station/add', 'App\Http\Controllers\PoliceStationController@store')->name('policestation.add');
Route::delete('/admin/police/station/delete/{id}','App\Http\Controllers\PoliceStationController@destroy');

Route::resource('/wantedlist', 'App\Http\Controllers\WantedController');
Route::get('/admin/wantedlist', 'App\Http\Controllers\WantedController@index')->name('wanted.list');
Route::post('/admin/wantedlist-add', 'App\Http\Controllers\WantedController@store');
Route::delete('/admin/wantedlist/delete/{id}','App\Http\Controllers\WantedController@destroy');
Route::get('/admin/wantedlist/{id}/{catsts}','App\Http\Controllers\WantedController@wantedstatusstatus')->name('product-status');
