<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $positions = Position::orderBy('id')->get();
        return view('management/positions/staff_positions', compact('positions'));
    }

    public function AllStaffPositions() {
        $positions = Position::all();
        return response()->json($positions);
    }

    public function AddStaffPositions(Request $request) {
        $positions = $request->positions;

        $newPositions = [];
        foreach($positions as $position) {
            $newPositions[] = [
                'position' => strtolower($position),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('positions')->insert($newPositions);
        return response()->json(['info' => 'added successfully']);
    }

    public function editStaffPositions(Request $request, $id) {
        $request->validate([
            'position' => 'required'
        ]);
        $position = Position::find($id);

        $position->position = strtolower($request->input('position'));
        $position->save();

        return redirect()->back()->with(['info' => 'Staff position updated successfully']);
    }

    public function deleteStaffPositions($id) {
        Position::find($id)->delete();

        return redirect()->back()->with(['info' => 'Staff position deleted successfully']);
    }
    

    public function checkPosition(Request $request) {
        $positionId = $request->id;
        $position = Position::whereId($positionId)->first('position');

        return $position->position;
    }

    public function getColleges() {
        $colleges = College::all();

        return response()->json($colleges);
    }

}
