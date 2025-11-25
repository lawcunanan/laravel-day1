<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authentication;
use App\Http\Controllers\UserController;



//Auth Routes
Route::get('/', [AuthController::class, 'redirect']);
Route::get('/register', fn() => view('auth.register'));

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('registerUser');
    Route::post('/logout', 'logout')->name('logout');
});


//Admin Routes
Route::middleware([Authentication::class . ':admin'])->group(function () {
    Route::get('/userlist', [UserController::class, 'index'])->name('viewUserList');
    Route::patch('/users/{user}/{status}', [UserController::class, 'statusUser'])->name('statusUser');
});


//User Routes
Route::middleware([Authentication::class . ':user'])->group(function () {
    Route::get('/addTask', fn() => view('addTask'));
    Route::get('/taskShow', [TaskController::class, 'index'])->name('viewTasks');
    Route::get('/editTask/{task}', [TaskController::class, 'edit'])->name('viewEditTask');

    Route::post('/tasks', [TaskController::class, 'store'])->name('createTask');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('updateTask');
    Route::patch('/tasks/{task}', [TaskController::class, 'updateStatus'])->name('updateTaskStatus');
});



