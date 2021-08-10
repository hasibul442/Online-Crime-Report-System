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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'App\Http\Controllers\FrontpageController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\FrontpageController@index');
Route::get('/emergency', 'App\Http\Controllers\FrontpageController@emergency')->name('emergency');
Route::get('/casestatus', 'App\Http\Controllers\FrontpageController@casestatus')->name('casestatus');
Route::get('/complaint', 'App\Http\Controllers\FrontpageController@complaint')->name('complaint');
Route::get('/policestation', 'App\Http\Controllers\FrontpageController@policestation')->name('policestation');
Route::get('/helpline', 'App\Http\Controllers\FrontpageController@helpline')->name('helpline');


Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/admin/hotline', 'App\Http\Controllers\HotlineController@index')->name('hotline')->middleware('auth');
Route::get('/admin/fetchdata', 'App\Http\Controllers\HotlineController@fetchdata')->name('helpline.fatchdata')->middleware('auth');

//Route::prefix('/admin')->middleware('auth')->group(function () {

//});

Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('category');
Route::post('/category-add', 'App\Http\Controllers\CategoryController@store')->name('category.add');
Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.delete');
Route::get('/category-edit/{id}', 'App\Http\Controllers\CategoryController@edit');
Route::post('/category-update/{id}', 'App\Http\Controllers\CategoryController@update');
Route::get('/category/{id}/{catsts}','App\Http\Controllers\CategoryController@catstatus')->name('catstatus');


