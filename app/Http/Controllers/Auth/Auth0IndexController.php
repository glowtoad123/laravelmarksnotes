<?php

namespace App\Http\Controllers\Auth;
use App;
use Auth;
use Redirect;
use App\Http\Controllers\Controller;
use App\Models\Note;

class Auth0IndexController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        }

        return App::make('auth0')->login(
            null,
            null,
            ['scope' => 'openid name email email_verified'],
            'code'
        );
    }

    public function logout()
    {
        Auth::logout();

        $logoutUrl = sprintf(
            'https://%s/v2/logout?client_id=%s&returnTo=%s',
            config('laravel-auth0.domain'),
            config('laravel-auth0.client_id'),
            config('app.url')
        );

        return Redirect::intended($logoutUrl);
    }

    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('/welcome')->with([
            'user' => print_r(Auth::user()->getUserInfo()["email"], true),
            'notes' => Note::where("user", "=", Auth::user()->getUserInfo()["email"])->get(),
            /* print_r(Auth::user(), true) */
        ]);
    }

    public function allowCreation(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('/create')->with([
            'user' => print_r(Auth::user()->getUserInfo()["email"], true)
        ]);
    }
}
?>
