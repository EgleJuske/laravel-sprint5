<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');


// Error route
Route::any('/{any}', function () {
    return view('errors/error-page');
})->where('any', '.*');
