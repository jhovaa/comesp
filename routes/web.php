<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FormularioController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/saveForm', [FormularioController::class, 'saveForm'])->name('saveForm');
Route::get('/reporte', [FormularioController::class, 'reporte'])->name('reporte');

Route::get('/ver-pdf/{id}', [FormularioController::class, 'verPDF'])->name('verPDF');
