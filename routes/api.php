<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('attendance/inout', [App\Http\Controllers\Api\AttendanceController::class, 'inout']);

Route::get('attendance/inoutbtn/{id?}', [App\Http\Controllers\Api\AttendanceController::class, 'inoutbtn']);

Route::get('employee/all', [App\Http\Controllers\Api\EmployeeController::class, 'index']);
Route::post('employee/login', [App\Http\Controllers\Api\EmployeeController::class, 'login']);
Route::get('report/salary/all', [App\Http\Controllers\Api\SalaryController::class, 'index']);
Route::get('report/salary/{id?}', [App\Http\Controllers\Api\SalaryController::class, 'report_salary']);
