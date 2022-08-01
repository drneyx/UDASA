<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $newsLetter = NewsLetter::orderBy('created_at', 'DESC')->get();
        return view('front-pages/newsLetter', compact('newsLetter'));
    }

    public function readNews($id) {
        $news = News::find($id);
        $recents = News::where('id', '!=', $id)->limit(7)->latest()->get();
        return view('front-pages/news/specific-news', compact('news', 'recents'));
    }

    public function readNewsLetter($id) {
        $news = NewsLetter::find($id);
        $recents = NewsLetter::where('id', '!=', $id)->limit(7)->latest()->get();
        return view('front-pages/news/specific-news', compact('news', 'recents'));

    }

    public function socialEvents() {
        $news = News::where('activity_type', 'social_event')->get();
        return view('front-pages/activities/social_events', compact('news'));
    }

    public function socialResponsibilities() {
        $news = News::where('activity_type', 'social_responsibility')->get();
        return view('front-pages/activities/social_responsibilities', compact('news'));
    }

    public function academicEvents() {
        $news = News::where('activity_type', 'academic_event')->get();
        return view('front-pages/activities/academic_events', compact('news'));
    }
    public function scholarship() {
        $scholarships = News::where('activity_type', 'scholarship')->get();
        // return $scholarships;
        return view('front-pages/activities/chachage_scholarship', compact('scholarships'));
    }
}
