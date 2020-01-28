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
    if (in_array($driver, ['google', 'facebook'])) {
        return Socialite::driver($driver)->redirect();
    }
    return 'this driver is not avaliable';
});
Route::get('/auth/{driver}/callback', function ($driver) {
    if (in_array($driver, ['google', 'facebook'])) {
        $user = Socialite::driver($driver)->user();
        dd($user);
    }
    return 'this driver is not avaliable';
});
