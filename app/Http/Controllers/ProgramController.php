<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->get("q");
        $programs = Program::where("program_name", "LIKE", "%$keyword%")->paginate(2);
        if($programs->isEmpty() && ($programs->currentPage() - 1) > 0) {
            return redirect()->route("programs", [ 'page' => $programs->currentPage() - 1, 'q' => request()->q ]);
        }
        return view("Program.index", compact("programs"));
    }
    public function create() {
        return view("Program.create");
    }
    public function store(Request $request) {
        $request->validate([
            "program_name" => [ "required" ],
            "description" => [ "required" ]
        ]);

        Program::create($request->except("_token"));

        return redirect()->to("/programs");
    }
    public function destroy(Program $program) {
        $program->delete();
        return redirect()->to("/programs");
    }
    public function update(Program $program) {
        return view("Program.update", compact("program"));
    }
    public function edit(Request $request, Program $program) {
        $request->validate([
            "program_name" => [ "required" ],
            "description" => [ "required" ]
        ]);

        $program->update($request->except("_token"));

        return redirect()->to("/programs");
    }
}
