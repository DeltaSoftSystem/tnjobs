<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/description');
Route::get('/description',function(){
    return view('pages.description');
});
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('registerpage');

Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('otp.verify');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('otp.check');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginpage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
