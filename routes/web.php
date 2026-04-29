<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

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

Route::controller(MovieController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/movie/{id}', 'detail');

    Route::get('/movies/data', 'data');
    Route::get('/movies/create', 'create');
    Route::post('/movies/store', 'store');
    Route::get('/movies/{id}/edit', 'edit');
    Route::post('/movies/{id}/update', 'update')->name('movies.update');
    Route::get('/movies/delete/{id}', 'delete')->name('movies.delete');
});
