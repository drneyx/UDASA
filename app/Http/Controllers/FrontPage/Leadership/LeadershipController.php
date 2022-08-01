<?php

namespace App\Http\Controllers\FrontPage\Leadership;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{
    public function allCurrentLeaders() {
        $leaders = Staff::join('positions', 'positions.id', '=', 'staff.position_id')
                        ->join('staff_categories', 'staff_categories.id', '=', 'staff.staff_category_id')
                        ->where('position_status', 'current')
                        ->orderByRaw("FIELD(position, 'chairperson', 'vice chairperson', 'general secretary', 'deputy secretary', 'treasurer', 'newsletter editor', 'college representative', 'school representative', 'institute representative', 'library representative', 'appointed excom member')")
                        ->select('positions.*', 'staff_categories.*', 'staff.*')
                        ->get();
        return view('front-pages/leadership/current_leadership', compact('leaders'));
    }

    public function allPreviousLeaders() {
        $leaders = Staff::join('positions', 'positions.id', '=', 'staff.position_id')
                        ->join('staff_categories', 'staff_categories.id', '=', 'staff.staff_category_id')
                        ->where('position_status', 'previous')
                        // ->orderByRaw("FIELD(position, 'chairperson', 'vice chairperson', 'general secretary', 'deputy secretary', 'treasurer', 'newsletter editor', 'college representative', 'school representative', 'institute representative', 'library representative', 'appointed excom member')")
                        ->select('positions.*', 'staff_categories.*', 'staff.*')
                        ->orderByDesc('staff.created_at')
                        ->get();
        return view('front-pages/leadership/previous_leadership', compact('leaders'));
    }


    // getting a specific staff details eg. bio
    public function staffDetails($staffId, Request $request) {
        $staff = Staff::join('staff_categories', 'staff_categories.id', '=', 'staff.staff_category_id')
                    ->join('positions', 'positions.id', '=', 'staff.position_id')
                    ->where('staff.id', $staffId)
                    ->select('positions.*', 'staff_categories.*', 'staff.*')
                    ->orderByRaw("FIELD(position, 'chairperson', 'vice chairperson', 'general secretary', 'deputy secretary', 'treasurer', 'newsletter editor', 'college representative', 'school representative', 'institute representative', 'library representative', 'appointed excom member')")
                    ->first();
// return $staff;
        return view('front-pages/leadership/staff_details', compact('staff'));
    }
}
