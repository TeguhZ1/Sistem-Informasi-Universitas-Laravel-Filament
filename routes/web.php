<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laporan/print', [LaporanController::class, 'print'])->name('laporan.print');
