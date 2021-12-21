<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//departments
Route::resource('department', DepartmentController::class);
Route::get('department/status/{id}', [App\Http\Controllers\DepartmentController::class, 'status'])->name('department.status');

//designations
Route::resource('designation', DesignationController::class);
Route::get('designation/status/{id}', [App\Http\Controllers\DesignationController::class, 'status'])->name('designation.status');

//employee
Route::resource('employee', EmployeeController::class);
Route::get('employee/status/{id}', [App\Http\Controllers\EmployeeController::class, 'status'])->name('employee.status');

//attendence
Route::resource('attendance', AttendanceController::class);
