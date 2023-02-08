<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function signIn(Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        
        if (!Auth::attempt($credentials)) {
            return redirect('signin')->withErrors('Invalid credentials');
        }

        if(Auth::user()->email_verified_at == NULL) {
            $this->signOut();
            return redirect()->intended('/')->withErrors('You are not verified');
        }

        return redirect('/')->withErrors('Login success');
    } 

    public function signUp(Request $request) {

        if(Auth::check()) {
            return redirect('signup')->withErrors('You are already signed in');
        }

        $request->validate([
            'name'=> 'required|min:3|max:255|string',
            'email'=> 'required|email|unique:users',
            "password"=> 'required|min:5|max:150|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        $mailData = $user->only('id');
        Mail::to($user->email)->send(new VerifyEmail($mailData));

        return redirect('/signin');
    }

    public function  signOut() {
        Session::flush();
        Auth::logout();

       return redirect('signin');
        
    }

    public function verifyEmail($id) {
        

        $user = User::find($id);
        if($user->email_verified_at != NULL) {
            return redirect('/signin');
        }

        $user->email_verified_at = date(now());
        $user->save();

        return redirect('/signin');
         
    }
}
