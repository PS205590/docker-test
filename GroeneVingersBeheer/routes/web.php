<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

// returns the home page with all posts
Route::get('/', EmployeeController::class .'@index')->name('employees.index');
// returns the form for adding a post
Route::get('/employees/create', EmployeeController::class . '@create')->name('employees.create');
// adds a post to the database
Route::post('/employees', EmployeeController::class .'@store')->name('employees.store');
// returns a page that shows a full post
Route::get('/employees/{employee}', EmployeeController::class .'@show')->name('employees.show');
// returns the form for editing a post
Route::get('/employees/{employee}/edit', EmployeeController::class .'@edit')->name('employees.edit');
// updates a post
Route::put('/employees/{employee}', EmployeeController::class .'@update')->name('employees.update');
// deletes a post
Route::delete('/employees/{employee}', EmployeeController::class .'@destroy')->name('employees.destroy');
