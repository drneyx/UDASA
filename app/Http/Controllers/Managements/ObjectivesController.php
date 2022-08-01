<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectivesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $objectives = Objective::all();
        return view('management.objectives.objectives', compact('objectives'));
    }

    public function addObjective(Request $request) {
        $objective = new Objective;

        $objective->title = $request->input('title');
        $objective->objective = $request->input('objective');

        $objective->save();
        return response()->json(['message' => 'Objective added successfully']);
    }

    public function editObjective($id, Request $request) {
        $objective = Objective::find($id);

        $objective->title = $request->input('title');
        $objective->objective = $request->input('objective');

        $objective->save();
        return redirect()->back()->with(['info' => 'Objective updated successfully']);
    }

    public function deleteObjective($id) {
        Objective::find($id)->delete();
        
        return redirect()->back()->with(['info' => 'Objective deleted successfully']);
    }
}
