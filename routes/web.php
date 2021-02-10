<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\UsersPropertiesController;

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

/* Route::get('/', function () {
    return view('welcome');
})->name('dashboard'); */

Route::resource('/', UsersPropertiesController::class);

Route::resource('users', UserController::class);

Route::resource('properties', PropertiesController::class);
Route::post('/addproperty', [PropertiesController::class, 'addProperty'])->name('addproperty');