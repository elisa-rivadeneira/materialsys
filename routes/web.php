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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('materials', 'App\Http\Controllers\MaterialController')->middleware('auth');
Route::post("/material/{id}", "App\Http\Controllers\MaterialController@update");

Route::get('/encampo', "App\Http\Controllers\MaterialController@encampo")->middleware('auth');
Route::get('/xubicar', "App\Http\Controllers\MaterialController@xubicar")->middleware('auth');
Route::get('/xcomprar', "App\Http\Controllers\MaterialController@xcomprar")->middleware('auth');;


