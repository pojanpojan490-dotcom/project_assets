<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LokasiController;

Route::get('/', function () {
    return redirect('/welcome');
});

Route::resource('assets', AssetController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('lokasis', LokasiController::class);
