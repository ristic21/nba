<?php

namespace App\Http\Controllers;

use App\Mail\CommentRecieved;
use App\Models\Comment;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:5|max:2000|string',
            
        ]);

        $this->middleware('invalidComment');

        $comment = new Comment();
        $comment->content = $request->content;
        
        $team = Team::find($request->team_id);

        $comment->team()->associate($team);

        $user = User::find(Auth::user()->id);
        $comment->user()->associate($user);

        $comment->save();

        $mailData = $team->only('id');
        Mail::to($team->email)->send(new CommentRecieved($mailData));

        return redirect('teams/' . $request->team_id)->with('status', 'Comment successfully posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
