<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskManagerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/taskManager',[TaskManagerController::class,'show'])->name('task.show');

Route::post('taskManager/addTaskForm/submit',[TaskManagerController::class,'store'])->name('add.task');

Route::delete('/taskManager/removeTask/{id}',[TaskManagerController::class,'remove'])->name('remove.task');
Route::delete('/taskManager/removeTask/{id}',[TaskManagerController::class,'removeCompletedTask'])->name('remove.completetask');

Route::post('/taskManager/editTask/{id}',[TaskManagerController::class,'edit'])->name('edit.task');

Route::put('/taskManager/updateTask/{id}',[TaskManagerController::class,'update'])->name('update.task');

Route::post('/taskManager/completeTask/{id}',[TaskManagerController::class,'complete'])->name('complete.task');
