<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', 'App\Http\Controllers\FrontpageController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\FrontpageController@index');
Route::get('/casestatus', 'App\Http\Controllers\FrontpageController@casestatus')->name('casestatus');
Route::get('/complaint', 'App\Http\Controllers\FrontpageController@complaint')->name('complaint');
Route::get('/policestation', 'App\Http\Controllers\ApiController@policestation')->name('policestation');
Route::get('/hotline', 'App\Http\Controllers\ApiController@index')->name('helpline');
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
