<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsLetter;
use App\Models\Staff;
use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $staffsCount = Staff::count();
        $newsCount = News::count();
        $newsLetterCount = NewsLetter::count();
        $totalVisitors = Visitor::all()->count();
        // $totalVisitors = Visitor::whereDay('created_at', date('d'))->count();
        return view('dashboard', compact('staffsCount', 'newsCount', 'newsLetterCount', 'totalVisitors'));
    }

}
