<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
  Route::get('/cetak/{instruction}', App\Http\Controllers\CetakController::class)->name('cetak');
});