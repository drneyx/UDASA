<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use App\Models\StaffCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $categories = StaffCategory::all();
        return view('management/staffCategories/staff_categories', compact('categories'));
    }

    
    public function getAllStaffCategories() {
        $categories = StaffCategory::all();
        return response()->json($categories);
    }

    
    public function AddStaffCategories(Request $request) {
        $categories = $request->categories;

        $newCategories = [];
        foreach($categories as $category_name) {
            $newCategories[] = [
                'category_name' => strtolower($category_name),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('staff_categories')->insert($newCategories);
        return response()->json(['info' => 'added successfully']);
    }

    public function editStaffCategories(Request $request, $id) {
        $request->validate([
            'category_name' => 'required'
        ]);
        $category = StaffCategory::find($id);

        $category->category_name = strtolower($request->input('category_name'));
        $category->save();

        return redirect()->back()->with(['info' => 'Staff category updated successfully']);
    }

    public function deleteStaffCategories($id) {
        StaffCategory::find($id)->delete();

        return redirect()->back()->with(['info' => 'Staff category deleted successfully']);
    }
    
}
