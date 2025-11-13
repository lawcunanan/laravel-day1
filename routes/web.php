<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('home'); 
});


Route::controller(TaskController::class)->group(function () {
    Route::get('/taskShow', 'index')->name('showTasks.index');
    Route::get('/tasks-json/{status}', 'getAllTasksJson')->name('showTasks.json');
    Route::get('/editTask/{task}', 'edit')->name('editTask.edit');

    Route::post('/tasks', 'store')->name('addTasks.store');
    Route::put('/tasks/{task}', 'update')->name('updateTasks.update');
    Route::patch('/tasks/{task}', 'updateStatus')->name('updateTasks.status');
});