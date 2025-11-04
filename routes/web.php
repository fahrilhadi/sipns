<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankController;
use App\Http\Controllers\EchelonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeDataController;
use App\Http\Controllers\ChangePasswordController;

Route::get('/', function () {
    return view('login.index');
});

Route::middleware('auth')->group(function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // profil
    Route::resource('/profile', ProfileController::class, ['as' => 'user']);
    // ganti password
    Route::resource('/change-password', ChangePasswordController::class, ['as' => 'user']);
    // data pegawai
    Route::resource('/employee-list', EmployeeDataController::class, ['as' => 'user']);
    // agama, golongan, eselon, jabatan, unit kerja dan tempat tugas
    Route::resource('/religions', ReligionController::class, ['as' => 'user']);
    Route::resource('/ranks', RankController::class, ['as' => 'user']);
    Route::resource('/echelons', EchelonController::class, ['as' => 'user']);
    Route::resource('/positions', PositionController::class, ['as' => 'user']);
});

require __DIR__.'/auth.php';
