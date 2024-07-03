<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradeLectureController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('students', StudentController::class);
Route::resource('lectures', LectureController::class);
Route::get('/grade_curriculums/{id}', [GradeController::class, 'get']);
Route::resource('grades', GradeController::class);
Route::post('/grade_lectures', [GradeLectureController::class, 'store']);
Route::patch('/grade_lectures/{id}', [GradeLectureController::class, 'update']);



