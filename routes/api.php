<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();



});

Route::post("/create-student", [StudentController::class, "createStudent"]);

Route::get("/list-student", [StudentController::class, "listStudent"]);

Route::put('/update-student/{id}', [StudentController::class, 'showUpdateForm'])->name('update-student');

Route::post("/delete-student", [StudentController::class, "deleteStudent"]);

Route::get("/my-form", [StudentController::class, "form"]);



