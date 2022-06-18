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

Route::group(['as' => 'central.'], function () {
    Route::get('/', function () {
        return view('central.welcome');
    })->name('index');

    include_route_files(__DIR__ . '/central');
});
