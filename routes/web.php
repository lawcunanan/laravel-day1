<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authentication;
use App\Http\Controllers\DashboardRedirectController;


Route::get('/', [DashboardRedirectController::class, 'redirect']);


Route::get('/register', function () {
    return view('auth.register'); 
});


Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register.store');
    Route::post('/logout', 'logout')->name('logout');
});


Route::middleware([Authentication::class . ':admin'])->group(function () {
    Route::get('/userlist', [AuthController::class, 'index'])->name('userList.index');
    Route::patch('/users/{user}', [AuthController::class, 'deactivateUser'])->name('user.deactivate');
});


Route::middleware([Authentication::class . ':user'])->group(function () {
    Route::get('/home', function () {
        return view('home'); 
    })->name('home');

    Route::get('/taskShow', [TaskController::class, 'index'])->name('showTasks.index');
    Route::get('/tasks-json/{status}', [TaskController::class, 'getAllTasksJson'])->name('showTasks.json');
    Route::get('/editTask/{task}', [TaskController::class, 'edit'])->name('editTask.edit');
    Route::post('/tasks', [TaskController::class, 'store'])->name('addTasks.store');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('updateTasks.update');
    Route::patch('/tasks/{task}', [TaskController::class, 'updateStatus'])->name('updateTasks.status');
});
