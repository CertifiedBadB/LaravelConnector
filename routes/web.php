<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies',[MovieController::class,'index'])->name('movie.index');
Route::get('/movies/create',[MovieController::class,'create'])->name('movie.create');
Route::post('/movies',[MovieController::class,'store'])->name('movie.store');