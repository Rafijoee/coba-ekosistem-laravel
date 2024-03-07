<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
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


Route::get("login", [AuthController::class, 'login'])->name('');
Route::post("login", [AuthController::class, 'authenticate'])->name('');
Route::get("logout", [AuthController::class, 'logout'])->name('');
Route::get('register', [AuthController::class, 'register'])->name('');
Route::get("register", [AuthController::class, 'form_register'])->name('');
