<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichphp a
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('verifyTokenMiddleware')->prefix('tasks')->group(function () {
//Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index']); // List all tasks
    Route::post('/', [TaskController::class, 'store']); // Create a new task
    Route::get('/{task}', [TaskController::class, 'show']); // Get a specific task
    Route::put('/{task}', [TaskController::class, 'update']); // Update a specific task
    Route::delete('/{task}', [TaskController::class, 'destroy']); // Delete a specific task
});
