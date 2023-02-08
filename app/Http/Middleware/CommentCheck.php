<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CommentCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $words = ['idiot', 'stupid', 'hate'];
        foreach($words as $word) {
            if(in_array($word, explode(" ", $request->content))){
                return redirect('/teams/' . $request->team_id)->withErrors('Hatefull comment');
            }
        }
       

        


        return $next($request);
    }
}
