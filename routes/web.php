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

  Route::get('register', 'RegisterController@register')->name('register');
  Route::post('register/store', 'RegisterController@store')->name('register.store');
});

Route::namespace('Auth')->middleware('auth')->group(function () {
  Route::get('logout', function(){
    return back();
  });
  Route::post('logout', 'LoginController@logout')->name('logout');
});
// End Auth

// User
Route::prefix('user')->middleware('auth')->group(function (){
  Route::get('{nip}', 'UserController@showAuth')->middleware('CheckNIP')->name('user.showAuth');
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
