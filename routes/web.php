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
    return view('auth.login');
});

Auth::routes();

Route::resource('tb-eps', App\Http\Controllers\TbEpController::class)->middleware('auth');
Route::resource('tb-roles', App\Http\Controllers\TbRoleController::class)->middleware('auth');
Route::resource('tb-usuarios', App\Http\Controllers\TbUsuarioController::class)->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
