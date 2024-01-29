<?php

use App\Http\Controllers\employeeController;
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
    return view('index');
});

Route::get('/employee-list','App\Http\Controllers\employeeController@employeeRead');
Route::post('/add-employee','App\Http\Controllers\employeeController@addEmployee');
Route::get('employee-view','App\Http\Controllers\employeeController@employee_view');
Route::get('employee-delete', [employeeController::class, 'employee_delete']);
Route::post('employee-edit', [employeeController::class, 'employee_edit']);
Route::get('employee-list', [employeeController::class, 'employee_list']);

