<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(10);
        return view('news', compact('news')) ;
    }

    public function show($id)
    {
        $news = News::find($id);
        $user = User::where('id', $news->user_id)->get();
        return view('single-news', compact('news', 'user'));
    }

}
