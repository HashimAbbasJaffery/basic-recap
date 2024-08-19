<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class CourseController extends Controller
{
    public function assign(Request $request, User $user) {


        $validation = $request->validate([
            "course" => ["required"]
        ]);

        $user->courses()->attach($request->course);

        return redirect()->back();
        
    }

    public function addMarks(Request $request, Course $course, User $user) {
        $percentage = $request->percentage;
        dd($percentage);
    }

    public function index(Request $request) {
        $keyword = $request->q;
        $courses = Course::where("course", "LIKE", "%" .$keyword . "%")->paginate(2);
        return view("Course.index", compact("courses"));
    }
    public function create() {
        return view("Course.create");
    }
    public function store(Request $request) {
        $request->validate([
            "course" => [ "required" ]
        ]);

        Course::create($request->except("_token"));

        return redirect()->to("/courses");
    }

    public function destroy(Course $course) {
        $course->delete();
        return redirect()->to(route("courses"));
    }
    public function update(Course $course) {

        return view("Course.update", compact("course"));
    }
    public function edit(Request $request, Course $course) {
        $request->validate([
            "course" => [ "required" ]
        ]);

        $course->update($request->except("_token"));
        return redirect()->to("/courses");
    }
}
