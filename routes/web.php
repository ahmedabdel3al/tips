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

Route::get('/{driver}', function ($driver) {
    return Socialite::driver($driver)->redirect();
});
Route::get('/auth/{driver}/callback', function ($driver) {
    $user = Socialite::driver($driver)->user();
    dd($user);
});
