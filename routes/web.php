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

// landing
Route::middleware('auth')->group(function () {
  Route::get('/', 'LandingController@landing')->name('landing');
});
// end landing

// Data Kartu Keluarga
Route::namespace('KartuKeluarga')->middleware('auth')->group(function () {
  Route::resource('kartukeluarga', 'DataKartuKeluargaController')->except([
    'show'
  ]);

  Route::prefix('kartukeluarga')->name('kartukeluarga.')->group(function () {
    Route::get('{nomorkk}', 'DataKartuKeluargaController@show')->name('show');
  });
});
// end Data Kartu Keluarga

// Data Anggota Keluarga
Route::prefix('kartukeluarga/{nomorkk}')->name('anggotakeluarga.')->middleware('auth')->group(function () {
  Route::get('create', 'AnggotaKeluargaController@create')->name('create');
  Route::post('store', 'AnggotaKeluargaController@store')->name('store');
  Route::get('{nomor_ktp}', 'AnggotaKeluargaController@show')->name('show');
  Route::patch('{nomor_ktp}', 'AnggotaKeluargaController@update')->name('update');
});
// end Data Anggota Keluarga

// Daftar Kartu Keluarga
Route::namespace('KartuKeluarga')->middleware('auth')->group(function () {
  Route::prefix('gelar')->name('gelar.')->group(function () {
    Route::get('', 'DaftarKartuKeluargaController@gelarIndex')->name('index');
    Route::post('store', 'DaftarKartuKeluargaController@gelarStore')->name('store');
    Route::patch('{gelar}/update', 'DaftarKartuKeluargaController@gelarUpdate')->name('update');
  });

  Route::prefix('golongandarah')->name('darah.')->group(function () {
    Route::get('', 'DaftarKartuKeluargaController@darahIndex')->name('index');
    Route::post('store', 'DaftarKartuKeluargaController@darahStore')->name('store');
    Route::patch('{golongandarah}/update', 'DaftarKartuKeluargaController@darahUpdate')->name('update');
  });

  Route::prefix('agama')->name('agama.')->group(function () {
    Route::get('', 'DaftarKartuKeluargaController@agamaIndex')->name('index');
    Route::post('store', 'DaftarKartuKeluargaController@agamaStore')->name('store');
    Route::patch('{agama}/update', 'DaftarKartuKeluargaController@agamaUpdate')->name('update');
  });

  Route::prefix('statusperkawinan')->name('statusPerkawinan.')->group(function () {
    Route::get('', 'DaftarKartuKeluargaController@statusPerkawinanIndex')->name('index');
    Route::post('store', 'DaftarKartuKeluargaController@statusPerkawinanStore')->name('store');
    Route::patch('{statusPerkawinan}/update', 'DaftarKartuKeluargaController@statusPerkawinanUpdate')->name('update');
  });

  Route::prefix('statushubungan')->name('statusHubungan.')->group(function () {
    Route::get('', 'DaftarKartuKeluargaController@statusHubunganIndex')->name('index');
    Route::post('store', 'DaftarKartuKeluargaController@statusHubunganStore')->name('store');
    Route::patch('{statusHubungan}/update', 'DaftarKartuKeluargaController@statusHubunganUpdate')->name('update');
  });

  Route::prefix('penyandangcacat')->name('penyandangCacat.')->group(function () {
    Route::get('', 'DaftarKartuKeluargaController@penyandangCacatIndex')->name('index');
    Route::post('store', 'DaftarKartuKeluargaController@penyandangCacatStore')->name('store');
    Route::patch('{penyandangCacat}/update', 'DaftarKartuKeluargaController@penyandangCacatUpdate')->name('update');
  });

  Route::prefix('pendidikanterakhir')->name('pendidikanTerakhir.')->group(function () {
    Route::get('', 'DaftarKartuKeluargaController@pendidikanTerakhirIndex')->name('index');
    Route::post('store', 'DaftarKartuKeluargaController@pendidikanTerakhirStore')->name('store');
    Route::patch('{pendidikanTerakhir}/update', 'DaftarKartuKeluargaController@pendidikanTerakhirUpdate')->name('update');
  });

  Route::prefix('pekerjaan')->name('pekerjaan.')->group(function () {
    Route::get('', 'DaftarKartuKeluargaController@pekerjaanIndex')->name('index');
    Route::post('store', 'DaftarKartuKeluargaController@pekerjaanStore')->name('store');
    Route::patch('{pekerjaan}/update', 'DaftarKartuKeluargaController@pekerjaanUpdate')->name('update');
  });
});
// end Daftar Kartu Keluarga
