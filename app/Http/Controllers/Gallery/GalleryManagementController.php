<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class GalleryManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
        $albums = Album::with('galleries')->get();
        // return $albums;
        return view('gallery/albums/albums', compact('albums'));
    }

    public function cteateAlbum(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $albumCheck = Album::where('album_name', $request->input('name'));
        if($albumCheck->exists()) {
            return redirect()->back()->with(['error' => 'Album Exists']);
        }
        else {
            $value = 0;
            $album = new Album;
            $album->album_name = $request->input('name');
            $album->description = $request->input('description');
            $album->slug = $this->generateSlug($request->input('name'), $value);
    
            $album->save();
            return redirect()->back()->with(['info' => 'Album created successfully']);
        }
    }

    public function editAlbum(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $albumCheck = Album::where('album_name', $request->input('name'))->where('id', '!=', $id);
        if($albumCheck->exists()) {
            return redirect()->back()->with(['error' => 'Album Exists']);
        }
        else {
            $album = Album::find($id);
            $album->album_name = $request->input('name');
            $album->description = $request->input('description');
            $album->slug = strtolower(str_replace(' ', '-', $request->input('name')));
    
            $album->save();
            return redirect()->back()->with(['info' => 'Album updated successfully']);
        }
    }

    public function deleteAlbum($id) {
        Album::find($id)->delete();
        return redirect()->back()->with(['info' => 'Album deleted successfully']);
    }

    public function generateSlug($albumName, $value) {
        if($value == 0) {
            $slug = strtolower(str_replace(' ', '-', $albumName));
        }
        else {
            $slug = strtolower(str_replace(' ', '-', $albumName)).'-'.$value;
        }
        $slugCheck = Album::where('slug', $slug);
        if($slugCheck->exists()) {
            $value ++;
            $this->generateSlug($albumName, $value);
        }

        return $slug;
    }
}
