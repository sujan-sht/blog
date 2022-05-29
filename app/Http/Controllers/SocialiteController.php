<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function githubRedirect(){
        // dd('hello');
        return Socialite::driver('github')->redirect();
    }
    public function callback(){
        $githubUser = Socialite::driver('github')->stateless()->user();
        // dd($githubUser->getId());
        $user = User::where('email',$githubUser->email)->first();
        // dd($user);
        if (! $user) {
            $user = User::create([
                'name' => $githubUser->nickname,
                'email' => $githubUser->email,
                'github_id' => $githubUser->getId(),
                'auth_type' => 'github',
            ]);
        }
        else if($user->email && $user->github_id){
            // dd('hello');
            // dd($user);
            Auth::login($user);
            return view('admin.dashboard')->with('status','Successfully logged in');
        }
        else{
            return redirect()->route('login')->with('error','Github id or Email already exists');

        } 
        Auth::login($user);

        return redirect('/dashboard');
    }


    public function googleRedirect(){
        // dd('hello');
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback(){
        $googleUser = Socialite::driver('google')->stateless()->user();
        
        $user=User::where('email',$googleUser->email)->first();
        // dd($googleUser);
        
        if (! $user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'image'=>$googleUser->avatar,
                'google_id' => $googleUser->id,
                'auth_type' => 'google',
            ]);
        } 
        else if($user->email && $user->google_id){
            Auth::login($user);
            return redirect()->route('admin.dashboard')->with('status','Successfully logged in');
        }
        else{
            return redirect()->route('login')->with('error','Google id or Email already exists');

        }
        Auth::login($user);

        return redirect('/dashboard')->with('status','Registered Successfully');
    }

    public function facebookRedirect(){
        // dd('hello');
        return Socialite::driver('facebook')->redirect();
    }
    public function facebookCallback(){
        $facebookUser = Socialite::driver('facebook')->stateless()->user();
        
        $user=User::where('email',$facebookUser->email)->first();
        // dd($facebookUser);
        
        if (! $user) {
            $user = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'image'=>$facebookUser->avatar,
                'facebook_id' => $facebookUser->id,
                'auth_type' => 'facebook',
            ]);
        } 
        else if($user->email && $user->facebook_id){
            Auth::login($user);
            return redirect()->route('admin.dashboard')->with('status','Successfully logged in');
        }
        else{
            return redirect()->route('login')->with('error','Facebook id or Email already exists');

        }
        Auth::login($user);

        return redirect('/dashboard')->with('status','Registered Successfully');
    }
}
