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

Route::get('/', 'HomeController@map')->name('home');

Route::get('/map', 'HomeController@map')->name('map');
Route::get('/aboutUs', 'HomeController@aboutUs')->name('aboutUs');

Route::get('/volunteer/profile', 'VolunteerController@profile')->name('volunteer.profile');
Route::resource('/volunteer', 'VolunteerController');
Route::get('/requester/profile/{requester}', 'RequesterController@profile')->name('requester.profile');
Route::resource('/requester', 'RequesterController');

Route::post('/volunteer/takeRequest/{requester}', 'VolunteerController@takeRequest')->name('volunteer.takeRequest');
