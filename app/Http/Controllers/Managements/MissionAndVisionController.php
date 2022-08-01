<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use App\Models\MissionVision;
use Illuminate\Http\Request;

class MissionAndVisionController extends Controller
{
    public function index() {
        $missionVision = MissionVision::all();
        return view('management/mission&vision/mission&vision', compact('missionVision'));
    }

    public function addMissionVision(Request $request) {
        $request->validate([
            'contents' => 'required'
        ]);
        $name = $request->input('name');
        $contents = $request->input('contents');

        $data = new MissionVision;
        $data->name = $name;
        $data->contents = $contents;
        $data->save();

        return redirect()->back()->with(['info' => 'added successfully']);
    }

    public function editMissionVision(Request $request, $id) {
        $request->validate([
            'contents' => 'required'
        ]);
        $name = $request->input('name');
        $contents = $request->input('contents');

        $data = MissionVision::find($id);
        $data->name = $name;
        $data->contents = $contents;
        $data->save();

        return redirect()->back()->with(['info' => 'edited successfully']);
    }

    public function deleteMissionVision($id) {
        MissionVision::find($id)->delete();

        return redirect()->back()->with(['info' => 'deleted successfully']);
    }
}
