<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsLetterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $newsLetters = NewsLetter::limit(5)->get();
        return view('management.news.newsLetter', compact('newsLetters'));
    }

    public function addNewsLetter(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'file' => 'mimes:pdf,xlx,csv',
            'date' => 'required',
        ]);

        $newsLetter = new NewsLetter;

        $newsLetter->title = $request->input('title');
        $newsLetter->description = $request->input('description');
        $newsLetter->date = $request->input('date');
// return $request->input('date');
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
            if(NewsLetter::where('image', 'public/storage/newsLetterImages/'.$fileNameToStore)->exists()){
            }
            else{
                $path = $request->file('image')->storeAs('newsLetterImages', $fileNameToStore, 'public');
            }

            // return $fileNameToStore;
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }

        $newsLetter->image = '/storage/newsLetterImages/'.$fileNameToStore;
        if ($request->hasFile('file')) {
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads/newsletters'), $fileName);
            $newsLetter->file = 'uploads/newsletters/'.$fileName;
        }
        $newsLetter->save();
        // return $fileName;

        return redirect()->back()->with(['info' => 'Newsletter added successfully']);
    }

    public function editNewsLetter(Request $request, $id) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
        ]);

        $newsLetter = NewsLetter::find($id);
        $newsLetter->title = $request->input('title');
        $newsLetter->description = $request->input('description');

        $newsLetter->save();

        return redirect()->back()->with(['info' => 'Newsletter updated successfully']);
    }
    public function deleteNewsLetter($id) {
        $newsLetter = NewsLetter::find($id);

        if($newsLetter->image != '/storage/newsLetterImages/noimage.jpg')
        {
            if(NewsLetter::where('id','!=', $id)->where('image', $newsLetter->image)->exists()){
                // Do not delete this image from the storage
            }else {
                $location = substr($newsLetter->image,21);
                Storage::delete('public/newsLetterImages/'.$location);
            }
        }


        // File::delete('uploads/news/'.$newsLetter->file);
        try {
            $path = public_path().'/'.$newsLetter->file;
            unlink($path);
        }finally {
            $newsLetter->delete();
            return redirect()->back()->with(['info' => 'Newsletter deleted successfully']);

        }
    }

    public function changeNewsLetterImage($id, Request $request) {
        $newsLetter = NewsLetter::find($id);

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
            if(NewsLetter::where('image', 'public/storage/newsLetterImages/'.$fileNameToStore)->exists()){
            }
            else{
                $location = substr($newsLetter->image,26);
                // return $location;
                Storage::delete('public/newsLetterImages/'.$location);

                $path = $request->file('image')->storeAs('newsLetterImages', $fileNameToStore, 'public');

                $newsLetter->image = '/storage/newsLetterImages/'.$fileNameToStore;
                $newsLetter->save();
                return redirect()->back()->with(['info' => 'Image updated successfully']);
            }

            // return $fileNameToStore;
        }
        else {
            return redirect()->back()->with(['info' => 'Nothing changed']);
        }
    }
}
