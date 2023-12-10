<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\auth\OtpController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/register', [AuthController::class, 'register']);
    Route::get('/auth/login', [AuthController::class, 'login'])->name('login');

    // sebenarnya gak usah pake param user_id sih, tapi gpp dah
    Route::get('/otp/verify/{user_id}', [OtpController::class, 'index']);
    Route::post('/otp/verify', [OtpController::class, 'store']);
    Route::post('/otp/resend/{user_id}', [OtpController::class, 'resend']);

    Route::post('/auth/register', [AuthController::class, 'register_action']);
    Route::post('/auth/login', [AuthController::class, 'login_action']);
});

Route::middleware(['auth', 'throttle:6,1'])->group(function () {
    Route::get('/email/verify', [VerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});
