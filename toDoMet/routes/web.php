<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo',[ToDoController::class,'readTask']);
Route::post('/addTask',[ToDoController::class,'addTask'])-> name('addTask');
Route::get('/deleteTask/{id}',[ToDoController::class,'deleteTask']) -> name(name: 'deleteTask');
Route::get('/editTask/{id}',[ToDoController::class,'editTask']) -> name(name: 'editTask');
Route::get('/editTask/{id}',[ToDoController::class,'editTask']) -> name('editTask');
Route::post('/updateTask',[ToDoController::class,'updateTask'])->name('updateTask');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
