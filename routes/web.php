<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;

Route::get('/', function () {
    return redirect('/assets');
});
    
Route::resource('assets', AssetController::class);
