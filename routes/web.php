<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/contacts/create', [\App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');

    Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'show'])->name('contacts.show');

    Route::post('/contacts', [\App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');

    Route::get('/contacts/{contact}/edit', [\App\Http\Controllers\ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');

    Route::delete('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.destroy');

    Route::post('/contacts/{contact}/restore', [\App\Http\Controllers\ContactController::class, 'restore'])->name('contacts.restore');

});

require __DIR__.'/auth.php';
