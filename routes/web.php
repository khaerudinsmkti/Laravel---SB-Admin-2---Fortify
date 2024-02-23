<?php

use App\Http\Controllers\KomoditasController;
use Illuminate\Support\Facades\Route;
use App\Komoditi;
use Illuminate\Http\Request;
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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/tabel-harga', 'WelcomeController@harga_eceran')->name('harga.eceran');
Route::get('/perkembangan-harga', 'WelcomeController@perkembangan_harga')->name('komoditas.perkembangan-harga');


Route::middleware('auth')->group(function() {
    Route::resource('basic', BasicController::class);
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('komoditas', KomoditasController::class);

    Route::post('/komoditas/import', 'KomoditasController@import')->name('komoditas.import');
    Route::get('/komoditas/filter', 'KomoditasController@filter')->name('komoditas.filter');
});
