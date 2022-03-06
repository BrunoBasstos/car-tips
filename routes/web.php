<?php

use App\Http\Controllers\TipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('tips/store', [TipController::class, 'store'])->name('tips.store');

require __DIR__ . '/auth.php';
