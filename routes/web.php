<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TodoController::class, 'index'])->name('index');
//route for todo crud
Route::post('todos',[TodoController::class, 'store'])->name('todos.store');
Route::post('todos/delete/{id}',[TodoController::class, 'destroy'])->name('todos.delete');
//route for category crud
Route::post('categories',[CategoryController::class, 'store'])->name('categories.store');
Route::post('categories/delete/{id}',[CategoryController::class, 'destroy'])->name('categories.delete');

