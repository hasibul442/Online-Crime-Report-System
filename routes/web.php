<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






Auth::routes();
//----------------Frontend Pages-----------------
Route::get('/', 'App\Http\Controllers\FrontpageController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\FrontpageController@index');
Route::get('/casestatus', 'App\Http\Controllers\FrontpageController@casestatus')->name('casestatus');
Route::get('/complaint', 'App\Http\Controllers\FrontpageController@complaint')->name('complaint');
Route::get('/policestation', 'App\Http\Controllers\FrontpageController@policestation')->name('policestation');
Route::get('/hotline', 'App\Http\Controllers\FrontpageController@helpline')->name('helpline');
Route::get('/wantedcriminallist', 'App\Http\Controllers\FrontpageController@wantedlist')->name('wantedlist');
Route::get('/expatriate', 'App\Http\Controllers\FrontpageController@expatriate')->name('expatriate');

Route::get('/general-diary', 'App\Http\Controllers\FrontpageController@general_diary')->name('general.diary');
Route::get('/general-diary/sample', 'App\Http\Controllers\FrontpageController@gd_sample')->name('gd_sample');
Route::get('/general-diary/register', 'App\Http\Controllers\FrontpageController@general_diary_register')->name('general_diary_register');
Route::post('/general-diary/register/add', 'App\Http\Controllers\FrontpageController@gdstore');


Route::get('/complaint/registration', 'App\Http\Controllers\FrontpageController@complaint_reg')->name('complaint_reg');
Route::get('/complaint/registration/district/{id}', 'App\Http\Controllers\FrontpageController@getdistrict')->name('police.district');
Route::get('/complaint/registration/upazila/{id}', 'App\Http\Controllers\FrontpageController@getupazilla')->name('police.upazila');
Route::get('/complaint/registration/policestation/{id}', 'App\Http\Controllers\FrontpageController@getthana');
Route::post('/complaint/registration/add', 'App\Http\Controllers\FrontpageController@complainstore');

//----------------Admin Panel Pages-----------------
Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Route::resource('/admin/hotlines', 'App\Http\Controllers\HotlineController');
Route::get('/admin/hotlines', 'App\Http\Controllers\HotlineController@index')->name('hotline');
Route::get('/admin/hotlines/edit/{id}','App\Http\Controllers\HotlineController@edit');
Route::put('/admin/hotlines/update','App\Http\Controllers\HotlineController@update');
Route::delete('/admin/hotlines/delete/{id}','App\Http\Controllers\HotlineController@destroy');

// Route::resource('/category', 'App\Http\Controllers\CategoryController')->middleware('auth');
// Route::get('/admin/category', 'App\Http\Controllers\CategoryController@index')->name('category');
// Route::post('/category-add', 'App\Http\Controllers\CategoryController@store')->name('category.add');
// Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.delete');
// Route::get('/category-edit/{id}', 'App\Http\Controllers\CategoryController@edit');
// Route::post('/category-update/{id}', 'App\Http\Controllers\CategoryController@update');
// Route::get('/category/{id}/{catsts}','App\Http\Controllers\CategoryController@catstatus')->name('catstatus');

// Route::resource('/police-station', 'App\Http\Controllers\PoliceStationController');
Route::get('/admin/police/station', 'App\Http\Controllers\PoliceStationController@index')->name('police.division');
Route::get('/admin/police/station/district/{id}', 'App\Http\Controllers\PoliceStationController@getdistrict')->name('police.district');
Route::get('/admin/police/station/upazila/{id}', 'App\Http\Controllers\PoliceStationController@getupazilla')->name('police.upazila');
Route::post('/admin/police/station/add', 'App\Http\Controllers\PoliceStationController@store')->name('policestation.add');
Route::get('/admin/police/station/edit/{id}','App\Http\Controllers\PoliceStationController@edit')->name('policestation.edit');
Route::put('/admin/police/station/update/{id}', "App\Http\Controllers\PoliceStationController@update");
Route::delete('/admin/police/station/delete/{id}','App\Http\Controllers\PoliceStationController@destroy');
Route::get('/admin/police/station/details/{id}','App\Http\Controllers\PoliceStationController@show')->name('policestation.details');

// Route::resource('/wantedlist', 'App\Http\Controllers\WantedController');
Route::get('/admin/wantedlist', 'App\Http\Controllers\WantedController@index')->name('wanted.list');
Route::get('/admin/wantedlist', 'App\Http\Controllers\WantedController@index')->name('wanted.list');
Route::post('/admin/wantedlist-add', 'App\Http\Controllers\WantedController@store');
Route::get('/admin/wantedlist/details/{id}', 'App\Http\Controllers\WantedController@show')->name('wanted.details');
Route::get('/admin/wantedlist/edit/{id}', 'App\Http\Controllers\WantedController@edit')->name('wanted.edit');
Route::put('/admin/wantedlist/update/{id}', 'App\Http\Controllers\WantedController@update');
Route::delete('/admin/wantedlist/delete/{id}','App\Http\Controllers\WantedController@destroy');
Route::get('/admin/wantedlist/{id}/{catsts}','App\Http\Controllers\WantedController@wantedstatusstatus')->name('product-status');

Route::get('/admin/complain','App\Http\Controllers\ComplainController@index')->name('complain.list');
Route::get('/admin/allcomplain','App\Http\Controllers\ComplainController@allcase')->name('allcomplain.list');
Route::get('/admin/gd','App\Http\Controllers\ComplainController@gdindex')->name('gd.list');
Route::get('/admin/allgd','App\Http\Controllers\ComplainController@allgdindex')->name('allgd.list');
Route::get('/admin/complain/details/{id}','App\Http\Controllers\ComplainController@complainshow')->name('complain.details');
Route::get('/admin/complain/{id}/{catsts}','App\Http\Controllers\ComplainController@complainstatus')->name('complain-status');


Route::get('/admin/users', 'App\Http\Controllers\UsersController@index')->name('users');
Route::get('/admin/users/edit/{id}', "App\Http\Controllers\UsersController@edit");
Route::put('/admin/users/update', "App\Http\Controllers\UsersController@update");
Route::put('/admin/users/password/update', "App\Http\Controllers\UsersController@passupdate");
