<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ChartJSController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Trang chủ - Chuyển hướng đến trang đăng nhập
Route::get('/', function () {
    return redirect('/login');  // Chuyển hướng đến trang đăng nhập
});

// Các route đăng ký và đăng nhập
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

// Các route CRUD cho Task (Tasks)
Route::resource('tasks', TaskController::class);

Route::get('chart', [ChartJSController::class, 'index'])->name('tasks.chart');

// Route để render view chứa React (catch-all route cho React) - đặt ở cuối cùng
Route::view('/{any}', 'welcome')->where('any', '.*');
  
