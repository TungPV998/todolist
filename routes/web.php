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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', "HomeController@index");
Route::get('/create', "HomeController@create")->name("home.create");
Route::get('/delete/{id}', "HomeController@delete")->name("home.delete");
Route::get('/edit/{id}', "HomeController@changeStatus")->name("home.edit");
