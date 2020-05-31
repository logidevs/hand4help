<?php

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


Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('language');

Auth::routes();

Route::get('/covid-statistics', 'HomeController@covid_statistics')->name('covid_statistics');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/map', 'HomeController@map')->name('map');
Route::get('/aboutUs', 'HomeController@aboutUs')->name('aboutUs');

Route::get('/volunteer/profile', 'VolunteerController@profile')->name('volunteer.profile');
Route::resource('/volunteer', 'VolunteerController');
Route::get('/requester/profile/{requester}', 'RequesterController@profile')->name('requester.profile');
Route::get('/requester/closeRequest/{requester}', 'RequesterController@closeRequest')->name('requester.closeRequest');
Route::get('/requester/openRequest/{requester}', 'RequesterController@openRequest')->name('requester.openRequest');
Route::resource('/requester', 'RequesterController');
Route::resource('/typeOfSupport', 'TypeOfSupportController');

Route::post('/volunteer/takeRequest/{requester}', 'VolunteerController@takeRequest')->name('volunteer.takeRequest');
