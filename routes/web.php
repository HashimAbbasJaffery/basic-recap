<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
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
Route::post("/course/{user}/remove", [CourseController::class, "deassign"]);
Route::post("/marks/{course}/{user}/add", [CourseController::class, "addMarks"]);



Route::delete("/course/{course}/delete", [CourseController::class, "destroy"])->name("deleteCourse");
Route::get("/courses", [CourseController::class, "index"])->name("courses");
Route::get("/course/create", [CourseController::class, "create"]);
Route::post("/course/create", [CourseController::class, "store"])->name("createCourse");
Route::get("/course/{course}/update", [CourseController::class, "update"])->name("updateCourse");
Route::put("/course/{course}/update", [CourseController::class, "edit"])->name("editCourse");
Route::get("/course/search", [CourseController::class, "search"])->name("searchCourse");
Route::get("/course/search", [CourseController::class, "searchCourse"]);

Route::get("/programs", [ProgramController::class, "index"])->name("programs");
Route::get("/program/create", [ProgramController::class, "create"])->name("program.create");
Route::post("/program/create", [ProgramController::class, "store"])->name("program.store");
Route::delete("/program/{program}/delete", [ProgramController::class, "destroy"])->name("program.delete");
Route::get("/program/{program}/update", [ProgramController::class, "update"])->name("program.update");
Route::put("/program/{program}/edit", [ProgramController::class, "edit"])->name("program.edit");