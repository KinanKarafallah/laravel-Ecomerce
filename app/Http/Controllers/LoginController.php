<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Interfaces\LoginInterface;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected $repo;
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('users.login') ;
    }

    public function __construct(LoginInterface $repo)
    {
        $this->repo=$repo;
    }

    public function login(LoginRequest $request)
    {
        return $this->repo->login($request);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out!');
    }


    /**
     * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        return $this->repo->handleProviderCallback();
    }

}
