<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientOrderController;
use App\Http\Controllers\ClientPaymentController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\ClientTransactionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::middleware(['auth:api'])->group( function () {
    // * Manajemen Jadwal Travel
    Route::get('/schedules', [ScheduleController::class, 'index']);
    Route::post('/schedules', [ScheduleController::class, 'create']);
    Route::get('/schedules/{id}', [ScheduleController::class, 'show']);
    
    // * Manajemen Pelaporan
    Route::get('/reports', [ReportController::class, 'index']);
    
    // * Master Data
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    
});

Route::middleware(['auth:api'])->group( function () {
    // * Pemesanan Tiket Travel
    Route::get('/order-ticket', [ClientOrderController::class, 'index']);
    Route::post('/order-ticket', [ClientOrderController::class, 'create']);
    
    // * Pembayaran Tiket Travel
    Route::get('/payment', [ClientPaymentController::class, 'index']);
    Route::post('/payment', [ClientPaymentController::class, 'create']);
    
    // * Riwayat Pemesanan Tiket
    Route::get('/transaction-history', [ClientTransactionController::class, 'index']);
    
    // * Profile
    Route::get('/profile', [ClientProfileController::class, 'index']);
});
