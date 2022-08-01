<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Position;
use App\Models\Staff;
use App\Models\StaffCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $staffs = Staff::join('positions', 'positions.id', '=', 'staff.position_id')
                        ->join('staff_categories', 'staff_categories.id', '=', 'staff.staff_category_id')
                        ->select('staff_categories.*', 'positions.*', 'staff_categories.*', 'staff.*')
                        ->orderByRaw("FIELD(position, 'chairperson', 'vice chairperson', 'general secretary', 'deputy secretary', 'treasurer', 'newsletter editor', 'representative')")
                        ->get();
        $positions = Position::all();
        $categories = StaffCategory::all();
        $colleges = College::all();
        return view('management.staffs.staffs', compact('staffs', 'positions', 'categories', 'colleges'));
    }

    // function for registering new staff

    public function registerStaff(Request $request) {
// return $request->all();
        $name = $request->input('full_name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $bio = $request->input('bio');
        $phone = $request->input('phone');
        $positionId = $request->input('positionId');
        $categoryId = $request->input('categoryId');

        if($request->hasFile('image')){
            // Get file with the extension
            $fileWithExt = $request->file('image')->getClientOriginalName();

            // Get just file name
            $fileName = pathinfo($fileWithExt, PATHINFO_FILENAME);

            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // File to store
            $fileNameToStore = $fileName.'.'.$extension;

            // Upload image
            if(Staff::where('image', 'public/storage/staffsImages/'.$fileNameToStore)->exists()){
            }
            else{
                $path = $request->file('image')->storeAs('staffsImages', $fileNameToStore, 'public');
            }

            // return $fileNameToStore;
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }
        
            $staff = new Staff;
            $staff->full_name = $name;
            $staff->phone = $phone;
            $staff->email = $email;
            $staff->position_id = $positionId;
            $staff->staff_category_id = $categoryId;
            $staff->bio = $bio;
            $staff->image = '/storage/staffsImages/'.$fileNameToStore;
            $staff->college_id = $request->input('collegeId');
            $staff->position_status = $request->input('statusPosition');
            $staff->leadership_year = $request->input('leadership_year');

            $staff->save();
// return $staff;
        return response()->json(['message' => 'Staff added successfully']);
    }

    public function deleteStaff($id) {
        $staff = Staff::findOrFail($id);
        if($staff->image != '/storage/staffsImages/noimage.jpg')
        {
            if(Staff::where('id','!=', $id)->where('image', $staff->image)->exists()){
                // Do not delete this image from the storage
            }else {
                $location = substr($staff->image,22);
                Storage::delete('public/staffsImages/'.$location);
            }
        }

        // return $location;
        $staff->delete();

        return redirect()->back()->with(['info' => 'Staff deleted successfully']);
    }

    public function editStaff($id, Request $request) {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(255)[0-9]{9}$/', 'max:13'],
            'email' => ['required', 'email'],
            'categoryId' => 'required',
            'positionId' => 'required',
            'bio' => 'required',
            'statusPosition' => 'required',
            'leadership_year' => 'required',

        ]);

        $staff = Staff::find($id);
        $staffCheck = Staff::where('email', $request->input('email'))->where('id', '!=', $id);

        if($staffCheck->exists()) {
            return redirect()->back()->with(['error' => 'Staff with that email exists']);
        }
        else {
            $staff->full_name = $request->input('full_name');
            $staff->phone = $request->input('phone');
            $staff->email = $request->input('email');
            $staff->staff_category_id = $request->input('categoryId');
            $staff->position_id = $request->input('positionId');
            $staff->bio = $request->input('bio');
            $staff->position_status = $request->input('statusPosition');
            $staff->leadership_year = $request->input('leadership_year');
            
            $position = Position::find($request->input('positionId'));

            if(str_contains($position->position, 'representative' )) {
                $staff->college_id = $request->input('collegeId');
            }
            else {
                $staff->college_id = null;
            }

            $staff->save();
            return redirect()->back()->with(['info' => 'Staff updated successfully']);
        }
    }

    public function changeImage($id, Request $request) {
        $staff = Staff::find($id);

        if($request->hasFile('image')){
            // Get file with the extension
            $fileWithExt = $request->file('image')->getClientOriginalName();

            // Get just file name
            $fileName = pathinfo($fileWithExt, PATHINFO_FILENAME);

            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // File to store
            $fileNameToStore = $fileName.'.'.$extension;

            // Upload image
            if(Staff::where('image', 'public/storage/staffsImages/'.$fileNameToStore)->exists()){
            }
            else{
                $location = substr($staff->image,21);
                Storage::delete('public/staffsImages/'.$location);

                $path = $request->file('image')->storeAs('staffsImages', $fileNameToStore, 'public');

                $staff->image = '/storage/staffsImages/'.$fileNameToStore;
                $staff->save();
                return redirect()->back()->with(['info' => 'Image updated successfully']);
            }

            // return $fileNameToStore;
        }
        else {
            return redirect()->back()->with(['info' => 'Nothing changed']);
        }
    }
}
