<?php

use GuzzleHttp\Middleware;
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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/Dashboard', 'HomeController@index')->name('Dashboard');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::prefix("/admin")->name("admin.")->middleware("is_admin")->group(function () {
    Route::resource('/users', 'UsersController');
    Route::get('/myprofile', 'HomeController@myProfile')->name("myprofile");
    Route::post('/myprofile/update', 'HomeController@myProfileUdate')->name("myprofile.update");
    Route::get('/cetak', 'HomeController@cetak')->name("cetak.index");
    Route::get('/cetak/laporan', 'HomeController@cetak_laporan')->name("cetak.laporan");
    Route::resource('/pelaporan', 'PelaporanController');
    Route::get('/', 'HomeController@adminHome');
});
Route::prefix("/users")->name("users.")->group(function () {
});
