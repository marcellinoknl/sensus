<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\DashboardController;
use App\Http\Controllers\Pages\DesaController;


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

//first page to load
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

//Auth
// Show login form
Route::get('/', [LoginController::class, 'index'])->name('home');

// Process the login
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//front end

//  ---village---
Route::get('/keloladesa', [DesaController::class, 'index'])->name('desa')->middleware('auth');

// Route to display the village creation form
Route::get('/villages/add', [DesaController::class, 'add'])->name('villages.add')->middleware('auth');

// Route to store a new village
Route::post('/villages', [DesaController::class, 'store'])->name('villages.store')->middleware('auth');

// Route to display the village edit form
Route::get('/villages/edit/{village}', [DesaController::class, 'edit'])->name('villages.edit')->middleware('auth');

// Route to update an existing village
Route::put('/villages/update/{village}', [DesaController::class, 'update'])->name('villages.update')->middleware('auth');

// Route to delete a village
Route::delete('/villages/delete/{village}', [DesaController::class, 'destroy'])->name('villages.destroy')->middleware('auth');

//Schedule
//Schedule route
Route::get('/schedule', [App\Http\Controllers\Pages\ScheduleController::class, 'index'])->name('schedule')->middleware('auth');
Route::get('/schedule/add', [App\Http\Controllers\Pages\ScheduleController::class, 'add'])->name('schedule.add')->middleware('auth');
Route::post('/schedule/store', [App\Http\Controllers\Pages\ScheduleController::class, 'store'])->name('schedule.store')->middleware('auth');
Route::get('/schedule/edit/{census}', [App\Http\Controllers\Pages\ScheduleController::class, 'edit'])->name('schedule.edit')->middleware('auth');
Route::put('/schedule/update/{census}', [App\Http\Controllers\Pages\ScheduleController::class, 'update'])->name('schedule.update')->middleware('auth');
Route::delete('/schedule/delete/{census}', [App\Http\Controllers\Pages\ScheduleController::class, 'destroy'])->name('schedule.destroy')->middleware('auth');


