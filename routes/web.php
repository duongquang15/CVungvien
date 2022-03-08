<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('create','TicketController@create')->name('create');
Route::post('stores','TicketController@stores')->name('stores');
Route::get('add_jobs','TicketController@add_jobs')->name('jobs');
Route::get('add_levels','TicketController@add_levels')->name('levels');
Route::post('file','TicketController@download_file');