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

    Route::get('/dashboard', [TodoListController::class, 'index'])->name('dashboard');                          //done
    Route::get('/todolist/create', [TodoListController::class, 'create'])->name('todolist.create');             //done
    Route::post('/todolist', [TodoListController::class, 'store'])->name('todolist.store');                     //done

    Route::get('/todolist/{id}', [TodoListController::class, 'show'])->name('todolist.show');                   //done
    Route::get('/todolist/{id}/edit', [TodoListController::class, 'edit'])->name('todolist.edit');              //done
    Route::patch('/todolist/{id}', [TodoListController::class, 'update'])->name('todolist.update');             //done
    Route::delete('/todolist/{id}', [TodoListController::class, 'destroy'])->name('todolist.destroy');          //done
    
    Route::get('/todolist/{todolistid}/todo/create', [TodoController::class, 'create'])->name('todo.create');
    Route::post('/todolist/{todolistid}/todo', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/todolist/{todolistid}/todo/{id}', [TodoController::class, 'edit'])->name('todo.edit');
    Route::patch('/todolist/{todolistid}/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/todolist/{todolistid}/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
