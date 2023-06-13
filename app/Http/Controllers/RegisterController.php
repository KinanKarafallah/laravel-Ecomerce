<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;

use App\Http\Requests\RegisterRequest;
use App\Models\User;



class RegisterController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);;
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }
}
