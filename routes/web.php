<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', ['App\Http\Controllers\TodosController', 'index'])->name('todos');
Route::get('/todos/{todo}', ['App\Http\Controllers\TodosController', 'show'])->name('todo.show');
Route::get('/new-todo', ['App\Http\Controllers\TodosController', 'create'])->name('new.todo');
Route::post('/store-todo', ['App\Http\Controllers\TodosController', 'store'])->name('store.todo');
Route::get('/todos/{todo}/edit', ['App\Http\Controllers\TodosController', 'edit'])->name('todo.edit');
Route::post('/todos/{todo}/update', ['App\Http\Controllers\TodosController', 'update'])->name('todo.update');
Route::get('/todos/{todo}/delete', ['App\Http\Controllers\TodosController', 'destroy'])->name('todo.delete');
Route::get('todos/{todo}/complete', ['App\Http\Controllers\TodosController', 'complete'])->name('todo.complete');
Route::get('todos/{todo}/redo', ['App\Http\Controllers\TodosController', 'redo'])->name('todo.redo');
