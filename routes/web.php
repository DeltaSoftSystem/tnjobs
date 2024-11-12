<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Mews\Captcha\Captcha;

Route::get('/captcha-image', [Captcha::class, 'create']);

Route::redirect('/','/description');
Route::get('/description',function(){ return view('pages.description'); })->name('description');
Route::get('/landing_page',function(){ return view('pages.landing_page');})->name('description2');

Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('otp.verify');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('otp.check');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('registerpage');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginpage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
