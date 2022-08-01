<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ChairMessage;
use App\Models\News;
use App\Models\NewsLetter;
use App\Models\Staff;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{

    public function index() {
         //Artisan::call('clear-compiled');
        $newsLetter = NewsLetter::limit(3)->get();
        // return $newsLetter;
        $news = News::latest()->where('activity_type', '!=', 'scholarship')->limit(2)->get();
        $leaders = Staff::join('positions', 'positions.id', '=', 'staff.position_id')
                        ->join('staff_categories', 'staff_categories.id', '=', 'staff.staff_category_id')
                        ->where('position_status', 'current')
                        ->select('positions.*', 'staff_categories.*', 'staff.*')
                        ->orderByRaw("FIELD(position, 'chairperson', 'vice chairperson', 'general secretary', 'deputy secretary', 'treasurer', 'newsletter editor')")
                        ->get();
                        // ->orderByRaw("FIELD(category_name, 'professor', 'associate professor', 'senior lecturer', 'lecturer', 'assistant lecturer', 'tutorial assistant')")


        $articles = Article::orderByDesc('articles.created_at')
                            ->limit(3)
                            ->get();
        $word = ChairMessage::join('staff', 'staff.id', '=', 'chair_messages.staff_id')
                            ->select('staff.*', 'chair_messages.*')
                            ->latest('chair_messages.created_at')
                            ->first();
        return view('front-pages.home',
            compact('news', 'leaders', 'articles', 'word')
        );
    }

    // getting the specific article
    public function readArticle($articleId) {
        $article = Article::where('articles.id', $articleId)
                            ->first();
        $recents = Article::where('id', '!=', $articleId)->orderByDesc('created_at')->limit(5)->get();
        // return $article;
        return view('MembersPublications/read_article', compact('article', 'recents'));
    }

    public function getVisitor(Request $request) {

        $visitor = $request->ip();
        $visitorCheck = Visitor::where('visitor', $visitor)->whereDay('created_at', date('d'));
        if($visitorCheck->exists()) {
            return 'exists';
        }else {
            $newVisitor = new Visitor;
            $newVisitor->visitor = $visitor;
            $newVisitor->save();
        }
        return response()->json('saved');
    }


}
