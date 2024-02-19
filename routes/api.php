<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskActivityController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('categories', TaskCategoryController::class);
Route::apiResource('tasks', TaskController::class);
Route::get('tasks/{id}/activities', [TaskController::class, 'activities']);
Route::get('tasks/{assignId}/assign/{employeeId}', [TaskController::class, 'assign']);
Route::apiResource('task-activities', TaskActivityController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('user-groups', UserGroupController::class);
Route::get('user-groups/{id}/employees', [UserGroupController::class, 'employees']);
Route::apiResource('users', UserController::class);