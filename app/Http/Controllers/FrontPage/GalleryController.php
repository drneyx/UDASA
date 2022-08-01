<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index() {
        $albums = Album::with('galleries')->get();
        return view('front-pages/gallery/albums', compact('albums'));
    }

    public function viewGalleryImages($slug) {
        $album = Album::where('slug', $slug)->first();
        $gallery = Gallery::where('album_id', $album->id)->get();

        // return $gallery;
        return view('front-pages/gallery/gallery', compact('gallery'));
    }
}
