<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'api'], function ()
{
    // Project resources
    Route::group(['prefix' => 'projects', 'as' => 'projects.'], function ()
    {
        Route::get('', [\App\Http\Controllers\ProjectController::class, 'index'])->name('index');
        Route::post('', [\App\Http\Controllers\ProjectController::class, 'store'])->name('store');
        Route::get('{project}', [\App\Http\Controllers\ProjectController::class, 'show'])->name('show');
        Route::put('{project}', [\App\Http\Controllers\ProjectController::class, 'update'])->name('update');
        Route::delete('{project}', [\App\Http\Controllers\ProjectController::class, 'destroy'])->name('destroy');
    });

    // Task resources
    Route::group(['prefix' => 'tasks', 'as' => 'tasks.'], function ()
    {
        Route::get('', [\App\Http\Controllers\TaskController::class, 'index'])->name('index');
        Route::post('', [\App\Http\Controllers\TaskController::class, 'store'])->name('store');
        Route::get('{task}', [\App\Http\Controllers\TaskController::class, 'show'])->name('show');
        Route::put('{task}', [\App\Http\Controllers\TaskController::class, 'update'])->name('update');
        Route::delete('{task}', [\App\Http\Controllers\TaskController::class, 'destroy'])->name('destroy');
    });
});
