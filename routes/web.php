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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'],function (){
    //  Profile routes
    Route::group(['prefix' => 'profile'],function (){
        Route::get('/','UserController@profile')->name('profile');
        Route::post('/update','UserController@profileUpdate')->name('profile.update');
        Route::get('/history', 'UserController@history')->name('history');
        Route::get('/history/{id}/view', 'UserController@historyView')->name('history.view');
    });
    Route::group(['prefix' => 'appointment'],function (){
        Route::post('/{id}/update-log','AppointmentController@updateTimeLog')->name('appointment.time.log');
        Route::post('/{id}/log-get','AppointmentController@getTimeLog')->name('appointment.time.log.get');
    });
    Route::post('/appointment-book', 'AppointmentController@store')->name('appointment.store');
});
Route::get('/service/{alias}', 'ServiceController@index')->name('service');
Route::get('/category/{alias}', 'CategoryController@index')->name('category');
Route::post('/category/slot', 'CommonController@categorySlot')->name('category.slot');
