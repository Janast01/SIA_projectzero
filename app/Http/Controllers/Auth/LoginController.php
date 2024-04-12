<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }

    // Google Login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('home');
    }

    // Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('home');
    }

    // Github Login
    public function redirectToGithub()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    // Github callback
    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('home');
    }
}
