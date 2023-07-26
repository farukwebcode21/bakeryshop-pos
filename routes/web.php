<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
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
Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update', [UserController::class, 'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);
// Token Verify
Route::post('/reset-password', [UserController::class, 'ResetPass'])->middleware([TokenVerificationMiddleware::class]);

// User Logout
Route::get('/logout', [UserController::class, 'UserLogOut'])->name('page.logout');

// =============Page Routes ==================================
Route::controller(UserController::class)->group(function () {
    Route::get('/userLogin', 'LoginPage')->name('page.login');
    Route::get('/userRegistration', 'RegistrationPage')->name('page.registration');
    Route::get('/sendOtp', 'SendOtpPage')->name('page.sendOtp');
    Route::get('/verifyOtp', 'VerifyOTPPage')->name('page.verifyOtp');
    Route::get('/resetPassword', 'ResetPasswordPage')->middleware([TokenVerificationMiddleware::class])->name('page.resetPassword');
    Route::get('/userProfile', 'ProfilePage')->middleware([TokenVerificationMiddleware::class])->name('page.profileUpdate');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'DashboardPage')->middleware([TokenVerificationMiddleware::class])->name('page.dashboard');
});

// Customer API

Route::post('/create-customer', [CustomerController::class, 'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-customer', [CustomerController::class, 'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('/delete-customer', [CustomerController::class, 'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-customer', [CustomerController::class, 'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]);

// Category API

Route::post('/create-category', [CategoryController::class, 'CategoryCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-category', [CategoryController::class, 'CategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('/delete-category', [CategoryController::class, 'CategoryDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-category', [CategoryController::class, 'CategoryUpdate'])->middleware([TokenVerificationMiddleware::class]);

// Product API

Route::post('/create-product', [ProductController::class, 'CreateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-product', [ProductController::class, 'ProductList'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('/delete-product', [ProductController::class, 'DeleteProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-product', [ProductController::class, 'UpdateProduct'])->middleware([TokenVerificationMiddleware::class]);

// Dashboard API

Route::get('/total-customer', [DashboardController::class, 'TotalCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/total-category', [DashboardController::class, 'TotalCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/total-product', [DashboardController::class, 'TotalProduct'])->middleware([TokenVerificationMiddleware::class]);
