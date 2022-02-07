<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;

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

Auth::routes();

//Public 
Route::get('/', 'PublicController@index');
Route::get('/auth', 'Auth\LoginController@adminLogin')->name('adminLogin');
Route::get('/profile', 'PublicController@profile')->name('profile');

Route::get('/events', 'PublicController@events')->name('events');
Route::get('/event/{slug}', 'PublicController@detail')->name('detail');

Route::post('/send-message', 'PublicController@sendMessage')->name('sendMessage');

// ROUTE FOR ADMIN ONLY
Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin', 'active', 'check.session'])->group(function () {

    // Dashboard
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

    // Data KTP
    Route::resource('ktp', 'KTPController');

    // Data KTP By Kabupaten
    Route::resource('ktp-by-kabupaten', 'KTPByKabupatenController');

    // Cetak
    Route::resource('B', 'B');
    Route::resource('B1', 'B1');
    Route::resource('B11', 'B11');
    Route::resource('B2', 'B2');
    Route::resource('F1', 'F1');
    Route::post('F1/list', 'F1@list')->name('F1.list');
    Route::post('F1/lampiran', 'F1@lampiran')->name('F1.lampiran');

    // Data Article
    Route::resource('article', 'ArticleController');

    // Hak Akses
    Route::resource('user', 'UserController');
    Route::get('change-password', 'UserController@changePassword')->name('changePassword');
    Route::post('update-password', 'UserController@updatePassword')->name('updatePassword');

    // Data Kabupaten
    Route::resource('kabupaten', 'KabupatenController');
    Route::get('kabupaten/search', 'KabupatenController@search')->name('kabupaten.search');

    // Data Kecamatan
    Route::resource('kecamatan', 'KecamatanController');
    Route::get('kecamatan/search/{id}', 'KecamatanController@search')->name('kecamatan.search');

    // Data Desa
    Route::resource('desa', 'DesaController');
    Route::get('desa/search/{id}', 'DesaController@search')->name('desa.search');
});
