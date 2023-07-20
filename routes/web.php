<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
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
// ================ Web API Routes =============================

Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);
Route::post('/sent-otpcode', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);

// User Logout
Route::get('/logout', [UserController::class, 'UserLogOut'])->name('page.logout');

// Token Verify
Route::post('/reset-password', [UserController::class, 'ResetPass'])->middleware([TokenVerificationMiddleware::class]);

// =============Page Routes ==================================
Route::controller(UserController::class)->group(function () {
    Route::get('/userLogin', 'LoginPage')->name('page.login');
    Route::get('/userRegistration', 'RegistrationPage')->name('page.registration');
    Route::get('/sendOtp', 'SendOtpPage')->name('page.sendOtp');
    Route::get('/verifyOtp', 'VerifyOTPPage')->name('page.verifyOtp');
    Route::get('/resetPassword', 'ResetPasswordPage')->middleware([TokenVerificationMiddleware::class])->name('page.resetPassword');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'DashboardPage')->middleware([TokenVerificationMiddleware::class])->name('page.dashboard');
});
