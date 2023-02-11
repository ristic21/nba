<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(10);
        $teamsSidebar = Team::whereHas('news')->get();
        return view('news', compact('news', 'teamsSidebar')) ;
    }

    public function index2()
    {
        $teams = Team::all();
        return view('createnews', compact('teams')) ;
    }

    public function index3()
    {
        $teams = Team::whereHas('news')->get();
        return view('sidebar', compact('teams'));
    }

    public function show($id)
    {
        $news = News::find($id);
        $user = User::where('id', $news->user_id)->get();
        return view('single-news', compact('news', 'user'));
    }

    public function show2($team_name)
    {
        //USING PIVOT TABLE NEWS_TEAM
        $team = Team::where('name', $team_name)->first();
        

        $news = News::whereHas('teams', function($q) use ($team) {
            $q->whereIn('teams.id', [$team->id]);
        })->paginate(10);

        return view('teamNews', compact('news'));
    }


    public function store(Request $request) {

        $request->validate([
            'content' => 'required|min:5|max:2000|string',
            'title' => 'required|min:5|max:2000|string',
            'teamIds' => 'required|array',
            
        ]);

        $this->middleware('invalidComment');

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;

        $user = Auth::user();
        $news->user()->associate($user);

        $news->save();

        $ids = $request->input('teamIds');
        $news->teams()->sync($ids);
    
return redirect('/')->with('status', 'Comment successfully posted');
        

    }


}
