<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\PenyusutanController;


Route::get('/', function () {
    return redirect()->route('assets.index');
});

Route::resource('assets', AssetController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('barang', BarangController::class);
Route::resource('stok', StokController::class);
Route::resource('kerusakan', KerusakanController::class);
Route::resource('penyusutan', PenyusutanController::class);