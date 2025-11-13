<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login'); 
});

Route::get('/register', function () {
    return view('auth.register'); 
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register.store');
    Route::post('/logout', 'logout')->name('logout');
});



Route::get('/home', function () {
    return view('home'); 
});

Route::middleware('auth')->controller(TaskController::class)->group(function () {
    Route::get('/taskShow', 'index')->name('showTasks.index');
    Route::get('/tasks-json/{status}', 'getAllTasksJson')->name('showTasks.json');
    Route::get('/editTask/{task}', 'edit')->name('editTask.edit');
    Route::post('/tasks', 'store')->name('addTasks.store');
    Route::put('/tasks/{task}', 'update')->name('updateTasks.update');
    Route::patch('/tasks/{task}', 'updateStatus')->name('updateTasks.status');
});