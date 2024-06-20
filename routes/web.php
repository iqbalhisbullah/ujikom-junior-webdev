<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/dashboard', function () {
    return view('pages.main');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pegawai', function () {
    return view('pages.pegawai');
})->middleware(['auth', 'verified'])->name('pegawai');

Route::get('/profilee', function () {
    return view('pages.profile');
})->middleware(['auth', 'verified'])->name('profilee');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
