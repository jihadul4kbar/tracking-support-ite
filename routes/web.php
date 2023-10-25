<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

/*
| -------------------------------------
| Routing untuk Proses User
| -------------------------------------
*/
Route::get('/pengguna', [AuthController::class, 'datapengguna']);
Route::get('/daftar', [AuthController::class, 'formUser'])->name('daftar');
Route::post('/daftar',[AuthController::class, 'simpan'])->name('daftar');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login')->middleware('guest');

