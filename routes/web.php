<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;



Route::get("/student/add", [UserController::class, "create"]);
Route::post("/student/create", [UserController::class, "store"])->name("addUser");
Route::get("/student/{user}/update", [UserController::class, "update"])->name("updateUser");
Route::post("/student/{user}/edit", [UserController::class, "edit"])->name("editUser");
Route::get("/", [UserController::class, "index"])->name("students");
Route::put("/student/{user}/changeStatus", [UserController::class, "changeStatus"])->name('changeStatus');
Route::delete("/student/{user}/delete", [UserController::class, "destroy"])->name("deleteStudent");
Route::get("/student/{user}", [UserController::class, "moreInformation"]);

Route::post("/course/{user}/add", [CourseController::class, "assign"]);
Route::post("/marks/{course}/{user}/add", [CourseController::class, "addMarks"]);



Route::get("/courses", [CourseController::class, "index"])->name("courses");
Route::get("/course/create", [CourseController::class, "create"]);
Route::post("/course/create", [CourseController::class, "store"])->name("createCourse");
Route::delete("/course/{course}/delete", [CourseController::class, "destroy"])->name("deleteCourse");
Route::get("/course/{course}/update", [CourseController::class, "update"])->name("updateCourse");
Route::put("/course/{course}/update", [CourseController::class, "edit"])->name("editCourse");
Route::get("/course/search", [CourseController::class, "search"])->name("searchCourse");
