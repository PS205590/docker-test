<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserdataController;
use App\Http\Controllers\LoginRegisterController;

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

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Routes accessible only to admins
    Route::get('/management', [UserdataController::class, 'index'])->name('management.index');
    Route::get('/management/create', [UserdataController::class, 'create'])->name('management.create');
    Route::post('/management', [UserdataController::class, 'store'])->name('management.store');
    Route::get('/management/{employee}', [UserdataController::class, 'show'])->name('management.show');
    Route::get('/management/{employee}/edit', [UserdataController::class, 'edit'])->name('management.edit');
    Route::put('/management/{employee}', [UserdataController::class, 'update'])->name('management.update');
    Route::delete('/management/{employee}', [UserdataController::class, 'destroy'])->name('management.destroy');
});

Route::middleware(['auth', \App\Http\Middleware\EmployeeMiddleware::class])->group(function () {


    Route::get('/welcome', [EmployeeController::class, 'index'])->name('employee.welcome');
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.calendar');

    Route::get('/welcome', [CalendarController::class, 'welcome'])->name('employee.welcome');
    Route::get('/employee', [CalendarController::class, 'shifts'])->name('employee.shifts');

});
