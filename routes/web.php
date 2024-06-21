<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');


Route::get('/profilee', function () {
    return view('pages.profile');
})->middleware(['auth', 'verified'])->name('profilee');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Menggunakan EmployeeController untuk menampilkan data dan menambahkan middleware
Route::get('/employee', [EmployeeController::class, 'index'])->middleware(['auth', 'verified'])->name('employee');

require __DIR__.'/auth.php';
