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

// Auth
Route::namespace('Auth')->middleware('guest')->group(function () {
  Route::get('login', 'LoginController@login')->name('login');
  Route::post('login/store', 'LoginController@store')->name('login.store');

  Route::get('forgetpassword', 'LoginController@forgetPassword')->name('forget.password');
  Route::patch('forgetpassword', 'LoginController@forgetPasswordStore')->name('forget.password.store');

  Route::get('register', 'RegisterController@register')->name('register');
  Route::post('register/store', 'RegisterController@store')->name('register.store');
});

Route::namespace('Auth')->middleware('auth')->group(function () {
  Route::get('logout', function(){
    return back();
  });
  Route::post('logout', 'LoginController@logout')->name('logout');

  Route::patch('sendpassword/{nip}', 'LoginController@sendPassword')->name('send.password');
});
// End Auth

// User
Route::prefix('user')->middleware('auth')->group(function (){
  Route::get('', 'UserController@index')->middleware('CheckRole')->name('user.index');

  Route::get('{nip}', 'UserController@showAuth')->middleware('CheckNIP')->name('user.showAuth');
  Route::patch('{nip}/update', 'UserController@update')->name('user.update');
  Route::patch('{nip}/konfirmasi', 'UserController@konfirmasi')->name('user.konfirmasi');
  Route::patch('{nip}/batalkonfirmasi', 'UserController@batalKonfirmasi')->name('user.batalKonfirmasi');
});
// end User

Route::middleware('auth')->group(function () {
  Route::get('/', 'LandingController@landing')->name('landing');
});

Route::namespace('KartuKeluarga')->group(function () {
  Route::prefix('gelar')->name('gelar.')->group(function () {
    Route::get('/', 'DaftarKartuKeluargaController@gelarIndex')->name('index');
  });
});
