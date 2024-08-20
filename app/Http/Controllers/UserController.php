<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class UserController extends Controller
{
    public function index() {
        $keyword = request()->q;
        $students = User::where("name", "LIKE", "%$keyword%")->where("role", "student")->paginate(2);
        return view("Students.index", compact("students"));
    }

    public function changeStatus(User $user) {
        $user->update([
            "status" => !$user->status
        ]);
        return $user->status ? "disable" : "enable";
    }

    public function destroy(User $user) {
        $user->delete();
    }

    public function moreInformation(User $user) {
        $courses = Course::all();
        return view("Students.information", compact("user", "courses"));   
    }
    public function create() {
        return view("Students.create");
    }
    public function update(User $user) {
        return view("Students.update", compact("user"));
    }
    public function edit(Request $request, User $user) {

        $request->validate([
            "name" => ["required"],
            "email" => ["required",  "email", "unique:users,email," . $user->id],
            "password" => "required"
        ]);
        $user->update([...$request->all(), "role" => "student"]);
        return redirect()->to("/");
    }
    public function store(Request $request) {
        $request->validate([
            "name" => ["required"],
            "email" => ["required", "email", "unique:users"],
            "password" => "required"
        ]);
        User::create([...$request->all(), "role" => "student"]);

        return redirect()->to("/");
    }
}
