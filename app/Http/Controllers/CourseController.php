<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Program;

class CourseController extends Controller
{
    public function assign(Request $request, User $user) {

        $validation = $request->validate([
            "course" => ["required"]
        ]);
        $isAssigned = $user->courses()->firstWhere("course_id", $request->course)?->exists() ?? false;

        if($isAssigned) return;

        $user->courses()->attach($request->course);

        return redirect()->back();
        
    }
    public function deassign(Request $request, User $user) {
        $validation = $request->validate([
            "course" => ["required"]
        ]);

        $user->courses()->detach($request->course);

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
        $programs = Program::all();
        return view("Course.create", compact("programs"));
    }
    public function store(Request $request) {
        $request->validate([
            "course" => [ "required" ],
            "program" => [ "required" ]
        ]);

        $program = Program::find($request->program);
        $program->courses()->create($request->except("_token"));
        // Course::create($request->except("_token"));

        return redirect()->to("/courses");
    }

    public function destroy(Course $course) {
        $course->delete();
        return redirect()->to(route("courses"));
    }
    public function update(Course $course) {
        $programs = Program::all();
        
        return view("Course.update", compact("course", "programs"));
    }
    public function edit(Request $request, Course $course) {
        $request->validate([
            "course" => [ "required" ],
            "program" => [ "required" ]
        ]);

        $course->update([...$request->except("_token"), "program_id" => request()->program]);
        return redirect()->to("/courses");
    }
    public function searchCourse(Request $request) {
        $keyword = $request->search_courses;
        if(!$keyword) return;
        $courses = Course::where("course", "LIKE", "%$keyword%")->get();
        return $courses;
    }
}
