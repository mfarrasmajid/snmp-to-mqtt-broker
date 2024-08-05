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

// AUTH
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@submit_login');
Route::get('/logout', 'AuthController@logout')->name('logout');

// DASHBOARD
Route::get('/', 'MainController@dashboard')->name('dashboard');
