<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegistrationController::class, 'register']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.home');
    Route::post('/upload', [FileController::class, 'upload'])->name('file.upload');
    Route::get('/files', [FileController::class, 'index'])->name('file.index');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    Route::post('/verify/{file}', [AdminController::class, 'verify'])->name('admin.verify');
});
