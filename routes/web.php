<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CandidateProfileController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Dashboard + Profil (role'e göre korumalı)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:candidate')->group(function () {
        Route::get('/candidate/dashboard', [DashboardController::class, 'candidateDashboard'])
            ->name('candidate.dashboard');

        Route::get('/candidate/profile/create', [CandidateProfileController::class, 'create'])
            ->name('candidate.profile.create');
        Route::post('/candidate/profile', [CandidateProfileController::class, 'store'])
            ->name('candidate.profile.store');
        Route::get('/candidate/profile/edit', [CandidateProfileController::class, 'edit'])
            ->name('candidate.profile.edit');
        Route::put('/candidate/profile', [CandidateProfileController::class, 'update'])
            ->name('candidate.profile.update');
    });

    Route::middleware('role:employer')->group(function () {
        Route::get('/company/dashboard', [DashboardController::class, 'companyDashboard'])
            ->name('company.dashboard');

        Route::get('/company/profile/create', [CompanyController::class, 'create'])
            ->name('company.profile.create');
        Route::post('/company/profile', [CompanyController::class, 'store'])
            ->name('company.profile.store');
        Route::get('/company/profile/edit', [CompanyController::class, 'edit'])
            ->name('company.profile.edit');
        Route::put('/company/profile', [CompanyController::class, 'update'])
            ->name('company.profile.update');
    });
});