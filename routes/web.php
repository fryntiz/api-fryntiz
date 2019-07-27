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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

/******************************************
 *            PANEL DE GESTIÓN
 ******************************************/
Route::group(['prefix' => 'panel'], function() {
    Route::get('/', function() {
        return view('panel.index');
    });

    Route::get('/login', function() {
        return view('panel.login');
    });
});
