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
    });
});
Route::get('/service/{alias}', 'ServiceController@index');
Route::get('/category/{alias}', 'CategoryController@index');
