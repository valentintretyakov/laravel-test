<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('movies', MovieController::class);
    Route::get('/movies/{movie}/publish', [MovieController::class, 'publish'])->name('movies.publish');
    Route::get('/movies/{movie}/unpublish', [MovieController::class, 'unpublish'])->name('movies.unpublish');
    Route::resource('genres', GenreController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
