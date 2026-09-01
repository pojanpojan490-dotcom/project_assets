<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return redirect('/welcome');
});

// Route CRUD otomatis
Route::resource('assets', AssetController::class);
Route::resource('categories', CategoriesController::class);
