<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------s
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/spots', function () {
    return view('spots');
});
Route::get('/judges', function () {
    return view('judges');
});
Route::get('/blackroom', function () {
    return view('blackroom');
});
