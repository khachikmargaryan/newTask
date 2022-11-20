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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'web'])->group(function() {
    //User Routes
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/user-create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user-store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/user-edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::get('/user-show/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    Route::put('/user/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('/user-delete/{user}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

    Route::get('/user-locations/{user}', [App\Http\Controllers\UserController::class, 'locations'])->name('user.locations');
    Route::get('/add-user-location/{user}', [App\Http\Controllers\UserController::class, 'addLocation'])->name('user.location.create');


//Locations
    Route::get('/locations', [App\Http\Controllers\LocationController::class, 'index'])->name('locations');
    Route::get('/location-create/{id?}', [App\Http\Controllers\LocationController::class, 'create'])->name('location.create');
    Route::post('/location-store', [App\Http\Controllers\LocationController::class, 'store'])->name('location.store');
    Route::get('/location/{location}', [App\Http\Controllers\LocationController::class, 'edit'])->name('location.edit');
    Route::put('/location/{location}', [App\Http\Controllers\LocationController::class, 'update'])->name('location.update');
    Route::delete('/location-delete/{location}', [App\Http\Controllers\LocationController::class, 'delete'])->name('location.delete');

});


