<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageTaskController;
use Facade\FlareClient\View;

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





//Home page 
Route::get('/', [ManageTaskController::class,'showData']);

//Insert Task
Route::post('/insertTask', [ManageTaskController::class, 'insertTask']);

//Delete Task
Route::get('/deleteTask/{id}', [ManageTaskController::class, 'deleteTask']);

//
Route::get('doneTask/{id}',[ManageTaskController::class, 'doneTask']);


//Update Task
Route::get('/editTask/{id}', [ManageTaskController::class,'getTask']);
Route::post('/updateTask/{id}', [ManageTaskController::class, 'updateTask']);