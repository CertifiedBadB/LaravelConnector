<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies',[MovieController::class,'index'])->name('movie.index');
Route::get('/movies/create',[MovieController::class,'create'])->name('movie.create');
Route::post('/movies',[MovieController::class,'store'])->name('movie.store');
Route::delete('/movies',[MovieController::class,'cleanup'])->name('movie.cleanup');

Route::get('/series',[SeriesController::class,'index'])->name('series.index');
Route::get('/series/create',[SeriesController::class,'create'])->name('series.create');
Route::post('/series',[SeriesController::class,'store'])->name('series.store');
Route::delete('/series',[SeriesController::class,'cleanup'])->name('series.cleanup');
