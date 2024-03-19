<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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


Route::post('/login', [LoginRegisterController::class, 'authenticate'])->name('login');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

// returns the home page with all posts
//Route::get('/', EmployeeController::class .'@index')->name('management.index');
// returns the form for adding a post
Route::get('/management/create', EmployeeController::class . '@create')->name('management.create');
// adds a post to the database
Route::post('/management', EmployeeController::class .'@store')->name('management.store');
// returns a page that shows a full post
Route::get('/management/{employee}', EmployeeController::class .'@show')->name('management.show');
// returns the form for editing a post
Route::get('/management/{employee}/edit', EmployeeController::class .'@edit')->name('management.edit');
// updates a post
Route::put('/management/{employee}', EmployeeController::class .'@update')->name('management.update');
// deletes a post
Route::delete('/management/{employee}', EmployeeController::class .'@destroy')->name('management.destroy');
