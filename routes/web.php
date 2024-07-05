<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TodoCategoryController;

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

Route::get('/about', function () {
    return view('about');
});

Route::prefix('user')->group(function () {
    Route::get('/register', [UserController::class, 'register']);
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login/auth', [UserController::class, 'loginAuth']);
    Route::post('/register/store', [UserController::class, 'storeRegister']);
    Route::post('/logout', [UserController::class, 'logout']);
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
});

Route::prefix('todo')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/create', [TodoController::class, 'create']);
    Route::get('/edit/{id}', [TodoController::class, 'edit']);
    Route::get('/delete/{id}', [TodoController::class, 'destroy']);
    Route::post('/store', [TodoController::class, 'store']);
    Route::post('/update/{id}', [TodoController::class, 'update']);
});

Route::prefix('todolist')->group(function () {
    Route::get('/', [TodoListController::class, 'index']);
    Route::get('/delete/{id}', [TodoListController::class, 'destroy']);
    Route::post('/store', [TodoListController::class, 'store']);
    Route::post('/update/{id}', [TodoListController::class, 'update']);
});

Route::prefix('todocategory')->group(function () {
    Route::get('/', [TodoCategoryController::class, 'index'])->name('todocategory.index');
    Route::get('/create', [TodoCategoryController::class, 'create'])->name('todocategory.create');
    Route::post('/', [TodoCategoryController::class, 'store'])->name('todocategory.store');
    Route::get('/edit/{id}', [TodoCategoryController::class, 'edit'])->name('todocategory.edit');
    Route::put('/update/{id}', [TodoCategoryController::class, 'update'])->name('todocategory.update');
    Route::delete('/{id}', [TodoCategoryController::class, 'destroy'])->name('todocategory.destroy');
});
