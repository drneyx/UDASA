<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($albumId) {
        $gallery = Gallery::where('album_id', $albumId)->get();
        return view('gallery/images/gallery_images', compact('albumId', 'gallery'));
    }

    public function addPicture($albumId, Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $gallery = new Gallery;
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');

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
            if(Gallery::where('image', 'public/storage/gallery/'.$fileNameToStore)->exists()){
            }
            else{
                $path = $request->file('image')->storeAs('gallery', $fileNameToStore, 'public');
            }

            // return $fileNameToStore;
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }

        $gallery->album_id = $albumId;
        $gallery->image = '/storage/gallery/'.$fileNameToStore;
        $gallery->save();
        return redirect()->back()->with(['info' => 'Image added to gallery successfully']);
    }


    public function editGallery($id, Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $gallery = Gallery::find($id);

        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');

        
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
            if(Gallery::where('image', 'public/storage/gallery/'.$fileNameToStore)->exists()){
                // don't save if it exists
            }
            else{
                $location = substr($gallery->image,17);
                // return $location;
                Storage::delete('public/gallery/'.$location);

                $path = $request->file('image')->storeAs('gallery', $fileNameToStore, 'public');

                $gallery->image = '/storage/gallery/'.$fileNameToStore;

            }

        }
        $gallery->save();
        return redirect()->back()->with(['info' => 'Gallery updated successfully']);
    }

    public function deleteGallery($id) {
        $gallery = Gallery::find($id);

        if($gallery->image != '/storage/gallery/noimage.jpg')
        {
            if(Gallery::where('id','!=', $id)->where('image', $gallery->image)->exists()){
                // Do not delete this image from the storage
            }else {
                $location = substr($gallery->image,17);
                Storage::delete('public/gallery/'.$location);
            }
        }
        $gallery->delete();
        return redirect()->back()->with(['info' => 'Item deleted successfully']);
    }
}
