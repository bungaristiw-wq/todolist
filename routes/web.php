<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\TaskController;


// =============================
// GUEST ROUTES (Hanya bisa diakses tanpa login)
// =============================
Route::middleware('guest')->group(function () {

// REGISTER
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// LOGIN
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

});


// =============================
// AUTH ROUTES (Hanya bisa diakses setelah login)
// =============================
Route::middleware('auth')->group(function () {

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // HOME REDIRECT
    Route::get('/', function () {
        return redirect()->route('todolist.index');
    });

    // =============================
    // TODOLIST CRUD
    // =============================
    Route::get('/todolist', [TodolistController::class, 'index'])->name('todolist.index');
    Route::get('/todolist/create', [TodolistController::class, 'create'])->name('todolist.create');
    Route::post('/todolist/store', [TodolistController::class, 'store'])->name('todolist.store');
    Route::get('/todolist/edit/{id}', [TodolistController::class, 'edit'])->name('todolist.edit');
    Route::put('/todolist/update/{id}', [TodolistController::class, 'update'])->name('todolist.update');
    Route::delete('/todolist/delete/{id}', [TodolistController::class, 'destroy'])->name('todolist.delete');


    // =============================
    // TASK CRUD (Inside Todolist)
    // =============================
    Route::get('/todolist/{todolist_id}/task', [TaskController::class, 'index'])->name('task.index');
    Route::get('/todolist/{todolist_id}/task/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/todolist/{todolist_id}/task/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/todolist/{todolist_id}/task/{task_id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/todolist/{todolist_id}/task/{task_id}/update', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/todolist/{todolist_id}/task/{task_id}/delete', [TaskController::class, 'destroy'])->name('task.delete');
});
