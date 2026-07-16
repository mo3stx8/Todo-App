<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// route the index page from task folder to let it easy to call the other pages
Route::resource('tasks', TaskController::class);

// call index by name from the root folder to show it at the time U run the serve command
Route::get('/', [TaskController::class, 'index']);
