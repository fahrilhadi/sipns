<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('pages.dashboard', ['type_menu' => 'dashboard']);
    })->name('dashboard');

    // Route::resource('users', App\Http\Controllers\UserController::class);
});

require __DIR__.'/auth.php';
