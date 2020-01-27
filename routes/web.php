<?php

use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/send', 'HomeController@sendNotification');

Route::get('facebook', function () {
    return Socialite::driver('facebook')->redirect();
});
Route::get('/auth/facebook/callback', function () {
    $user = Socialite::driver('facebook')->user();
    dd($user);
});
