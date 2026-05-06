<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    //redirect to githup page
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    // 
    public function callback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();

            //dd($githubUser);

            $user = User::updateOrCreate([
                'github_id' => $githubUser->id,
            ], [
                'name' => $githubUser->name ?? $githubUser->nickname,
                'email' => $githubUser->email,
                'password' => Hash::make(Str::random(24)),
                'role' => 'user', 
            ]);
             //dd($user);
            Auth::login($user);
             //dd(Auth::check());
            

        return redirect('/posts');
            
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}