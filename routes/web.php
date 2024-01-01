<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;

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
// Route untuk tampilan form registrasi
Route::get('/register', [authController::class, 'showRegistrationForm'])->name('register');
// Route untuk proses registrasi
Route::post('/register', [authController::class, 'postregister']);
// Route untuk tampilan form login
Route::get('/login', [authController::class, 'showLoginForm'])->name('login');
// Route untuk proses login
Route::post('/login', [authController::class, 'postlogin']);

Route::get('/dashboard', [dashboardController::class, 'index']);