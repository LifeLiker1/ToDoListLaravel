<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/addTask', [PostController::class, "createTask"])->name('task.createTask');
Route::get('/task/{id}', [PostController::class, "detailView"])->name('task.detailView');
Route::get('/', [PostController::class, "show"])->name('tasks.index');
?>
