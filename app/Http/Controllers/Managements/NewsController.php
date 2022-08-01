<?php

namespace App\Http\Controllers\Managements;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $news = News::all();
        return view('management.news.news', compact('news'));
    }

    public function addNews(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'activity_type' => 'required',
            'date' => 'required'
        ]);

        // return $request->all();
        $news = new News;

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->body = $request->input('body');
        $news->activity_type = $request->input('activity_type');
        $news->date = Carbon::parse($request->input('date'))->format('Y-m-d');

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
            if(News::where('image', 'public/storage/newsImages/'.$fileNameToStore)->exists()){
            }
            else{
                $path = $request->file('image')->storeAs('newsImages', $fileNameToStore, 'public');
            }

            // return $fileNameToStore;
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }

        $news->image = '/storage/newsImages/'.$fileNameToStore;


        $news->save();
        // return $fileName;

        return redirect()->back()->with(['info' => 'News added successfully']);
    }

    public function editNews(Request $request, $id) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
            'body' => 'required',
            'activity_type' => 'required',
        ]);

        $news = News::find($id);

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->body = $request->input('body');
        $news->activity_type = $request->input('activity_type');

        $news->save();
        return redirect()->back()->with(['info' => 'News updated successfully']);
    }

    public function deleteNews($id) {
        $news = News::find($id);

        if($news->image != '/storage/newsImages/noimage.jpg')
        {
            if(News::where('id','!=', $id)->where('image', $news->image)->exists()){
                // Do not delete this image from the storage
            }else {
                $location = substr($news->image,21);
                Storage::delete('public/newsImages/'.$location);
            }
        }


            $news->delete();
            return redirect()->back()->with(['info' => 'News deleted successfully']);

    }

    public function changeNewsImage($id, Request $request) {
        $news = News::find($id);

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
            if(News::where('image', 'public/storage/newsImages/'.$fileNameToStore)->exists()){
            }
            else{
                $location = substr($news->image,20);
                // return $location;
                Storage::delete('public/newsImages/'.$location);

                $path = $request->file('image')->storeAs('newsImages', $fileNameToStore, 'public');

                $news->image = '/storage/newsImages/'.$fileNameToStore;
                $news->save();
                return redirect()->back()->with(['info' => 'Image updated successfully']);
            }

            // return $fileNameToStore;
        }
        else {
            return redirect()->back()->with(['info' => 'Nothing changed']);
        }
    }
}
