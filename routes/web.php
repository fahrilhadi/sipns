<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeDataController;
use App\Http\Controllers\ChangePasswordController;

Route::get('/', function () {
    return view('login.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/profile', ProfileController::class, ['as' => 'user']);
    Route::resource('/change-password', ChangePasswordController::class, ['as' => 'user']);
    Route::resource('/employee-list', EmployeeDataController::class, ['as' => 'user']);
    Route::resource('/religions', ReligionController::class, ['as' => 'user']);
});

require __DIR__.'/auth.php';
