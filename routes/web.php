<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskManagerController;

Route::get('/', function () {
    return redirect('/api/taskManager');
});

Route::get('/taskManager',function(){
    return redirect('/api/taskManager');
});

Route::get('/taskManager/addTask',function(){
    return view('addTaskForm');
})->name('addtask.form');

Route::get('/taskManager/completedTasks',[TaskManagerController::class,'showCompletedTask'])->name('showCompleted.task');

