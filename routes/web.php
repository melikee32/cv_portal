<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::get('/', function () {

    return view('welcome');

});



// Authentication

// Kayıt sayfası
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

// Kayıt işlemi
Route::post('/register', [AuthController::class, 'register']);


// Login sayfası
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Login işlemi
Route::post('/login', [AuthController::class, 'login']);


// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

