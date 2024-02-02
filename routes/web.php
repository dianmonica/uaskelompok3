<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


// Authentication Routes
Route::get('/login', [AuthController::class, 'halamanLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [AuthController::class, 'halamanRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



  
    Route::get('/client', [ClientController::class, 'index']);
    Route::get('/create-client', [ClientController::class, 'halamanTambah']);
    Route::post('/create-client', [ClientController::class, 'tambah']);
    Route::get('/edit-client/{id}', [ClientController::class, 'halamanEdit']);
    Route::post('/edit-client/{id}', [ClientController::class, 'edit']);
    Route::get('/hapus-client/{id}', [ClientController::class, 'hapus']);
    Route::get('/export-client', [ClientController::class, 'export']);

    Route::get('/transaction', [TransactionController::class, 'index']);
    Route::get('/create-transaction', [TransactionController::class, 'halamanTambah']);
    Route::post('/create-transaction', [TransactionController::class, 'tambah']);
    Route::get('/edit-transaction/{id}', [TransactionController::class, 'halamanEdit']);
    Route::post('/edit-transaction/{id}', [TransactionController::class, 'edit']);
    Route::get('/hapus-transaction/{id}', [TransactionController::class, 'hapus']);
    Route::get('/export-transaction', [TransactionController::class, 'export']);
});
