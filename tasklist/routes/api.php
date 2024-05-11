<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => '/tasks', 'as' => 'tasks.'], function () {
    Route::get('/', [TaskController::class, 'list']);
    Route::get('/{id}', [TaskController::class, 'get'])
        ->where('id', '[1-9][0-9]*');
    Route::post('/', [TaskController::class, 'store']);
    Route::put('/{id}', [TaskController::class, 'update'])
        ->where('id', '[1-9][0-9]*');
    Route::delete('/{id}', [TaskController::class, 'delete'])
        ->where('id', '[1-9][0-9]*');
    Route::put('/', [TaskController::class, 'reorder']);
});
