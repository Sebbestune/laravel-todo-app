<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoListController;
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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TodoListController::class, 'index'])->name('dashboard');

    Route::get('/todolist/{id}', [TodoListController::class, 'show'])->name('todolist.show');
    Route::get('/todolist/create', [TodoListController::class, 'create'])->name('todolist.create');
    Route::post('/todolist', [TodoListController::class, 'store'])->name('todolist.store');
    Route::get('/todolist/{id}/edit', [TodoListController::class, 'edit'])->name('todolist.edit');
    Route::patch('/todolist/{id}', [TodoListController::class, 'update'])->name('todolist.update');
    Route::delete('/todolist/{id}', [TodoListController::class, 'destroy'])->name('todolist.destroy');
    
    Route::get('/todo', [TodoController::class, 'create'])->name('todo.create');
    Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/todo/{id}', [TodoController::class, 'edit'])->name('todo.edit');
    Route::patch('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');

    // /todolist/{id}/todo/{id}

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
