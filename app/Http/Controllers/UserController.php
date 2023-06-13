<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{   
    public function index() {
        return view('users.userDashboard');
    }

    public function profile()
    {
        return view('users.profile');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

}
