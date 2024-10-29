<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MentorController;



use App\Models\User; // Import the Mentor model



use Illuminate\Support\Facades\Route;

// In routes/web.php
Route::get('/', [HomeController::class, 'index']);


// Route::get('/users/login', function () {
//     return view('auth.login');
// });


// Route::get('/users/login', function () {
//     return view('auth.login');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mentors', function () {
    return view('mentors.index');
});



Route::post('/mentors', [MentorController::class, 'index'])->name('mentors.index');

Route::get('/mentors/create', [MentorController::class, 'show'])->name('mentors.create');


Route::get('/mentors/{id}', [MentorController::class, 'show'])->name('mentors.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
