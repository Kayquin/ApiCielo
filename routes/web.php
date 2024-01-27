<?php

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
Route::post('/peyer', 'App\Http\Controllers\CieloController@peyer')->name('peyer');
Route::post('/payment/success', [CieloController::class, 'peyer'])->name('payment.success');
Route::post('/payment/error', [CieloController::class, 'peyer'])->name('payment.error');