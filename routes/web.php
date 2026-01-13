<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/tasks/{id}', [PostController::class, "detailView"])->name('task.detailView');
Route::put('/tasks/{id}', [PostController::class, "update"])->name('task.update');
Route::delete('/tasks/{id}', [PostController::class, "deleteTask"])->name('task.delete');
Route::post('/tasks', [PostController::class, "addNewTask"])->name('task.create');

Route::get('/', [PostController::class, "show"])->name('tasks.index');
?>
