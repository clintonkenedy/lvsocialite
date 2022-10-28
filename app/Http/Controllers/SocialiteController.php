<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;
class SocialiteController extends Controller
{
    //
    public function redirectGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub(){
        // $githubUser = Socialite::driver('github')->user();
        // dd($githubUser);

        try {
            $githubUser = Socialite::driver('github')->user();
            $findUser = User::where('gh_id',$githubUser->id)->first();
            if($findUser){
                Auth::login($findUser);
                return redirect()->intended('home');

            }
            else{
                $newUser = User::create([
                    'name'=>$githubUser->nickname,
                    'email'=>$githubUser->email,
                    'gh_id'=>$githubUser->id,
                    'avatar'=>$githubUser->avatar,
                    'password'=>encrypt('12345678')
                ]);
                Auth::login($newUser);
                return redirect()->intended('home');
            }
        }catch (Exception $e){
            dd($e->getMessage());
        }
    }
}
