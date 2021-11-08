<?php

use Illuminate\Support\Facades\Route;

Route::resource('test','\App\Http\Controllers\test');

// login
Route::get('/login', 'otentikasi\OtentikasiController@index' )-> name('login') ;
Route::post('/login', 'otentikasi\OtentikasiController@login') -> name('login');
Route::get('/logout', 'otentikasi\OtentikasiController@logout') -> name('logout');

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/', function () {
    //     return view('/home');
    // })->name('home');
    Route::resource('/','\App\Http\Controllers\HomeController');
    
    //profile user
    Route::get('/profile', 'otentikasi\OtentikasiController@profile' )-> name('profile') ;
    Route::post('/profile/simpan', 'otentikasi\OtentikasiController@profilesimpan') -> name('profile-user-simpan');
    
    Route::resource('downtime','\App\Http\Controllers\downtime\downtimeController');
    Route::resource('varian','\App\Http\Controllers\varianController');
    Route::resource('poproduksi','\App\Http\Controllers\poProduksiController');

    //QuantityRelease
    Route::resource('QuantityRelease','\App\Http\Controllers\QuantityReleaseQcController');

    //TimeReparation
    Route::resource('TimeReparation','\App\Http\Controllers\TimeReparationContoller');

    // QuantityProduction
    Route::get('QuantityProduction/detail/{id}','\App\Http\Controllers\QuantityProductionController@detail')->name('quantity_production_detail');
    Route::resource('QuantityProduction','\App\Http\Controllers\QuantityProductionController');

    //FillingPerfomance
    Route::get('FillingPerfomance/detail/{id}','\App\Http\Controllers\FillingPerfomanceController@detail')->name('filling_detail');
    Route::resource('FillingPerfomance','\App\Http\Controllers\FillingPerfomanceController');

});

// tambah user
Route::get('/tambahuser', 'otentikasi\OtentikasiController@tambah' )-> name('tambah-user') ;
Route::post('/tambahuser/simpan', 'otentikasi\OtentikasiController@simpan') -> name('tambah-user-simpan');