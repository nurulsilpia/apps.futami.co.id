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
// Route::resource('products','ProductController');

Route::resource('test','\App\Http\Controllers\test');
//          Nama route, nama controller

Route::resource('downtime','\App\Http\Controllers\downtime\downtimeController');
Route::resource('varian','\App\Http\Controllers\varianController');
Route::resource('poproduksi','\App\Http\Controllers\poProduksiController');

// login
Route::get('/coincalc', 'test@coincalc' )-> name('coincalc') ;
Route::get('/login', 'otentikasi\OtentikasiController@index' )-> name('login') ;
Route::post('/login', 'otentikasi\OtentikasiController@login') -> name('login');
Route::get('/logout', 'otentikasi\OtentikasiController@logout') -> name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('/home');
    });
    Route::get('/home', function () {
        return view('/home');
    });
    // tambah user
    Route::get('/tambahuser', 'otentikasi\OtentikasiController@tambah' )-> name('tambah-user') ;
    Route::post('/tambahuser/simpan', 'otentikasi\OtentikasiController@simpan') -> name('tambah-user-simpan');
    //profile user
    Route::get('/profile', 'otentikasi\OtentikasiController@profile' )-> name('profile') ;
    Route::post('/profile/simpan', 'otentikasi\OtentikasiController@profilesimpan') -> name('profile-user-simpan');
});

//QuantityRelease
Route::resource('QuantityRelease','\App\Http\Controllers\QuantityReleaseQcController');

//TimeReparation
Route::resource('TimeReparation','\App\Http\Controllers\TimeReparationContoller');

// QuantityProduction
Route::resource('QuantityProduction','\App\Http\Controllers\QuantityProductionController');

//FillingPerfomance
Route::resource('FillingPerfomance','\App\Http\Controllers\FillingPerfomanceController');
