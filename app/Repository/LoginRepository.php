<?php

namespace App\Repository;

use App\Interfaces\LoginInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginRepository implements LoginInterface{


    public function login($request)
    {
       $data = $request->validated();

        if(auth()->attempt($data)) {
            $request->session()->regenerate();
            if(Auth::user()->role_as == '1'){
                return redirect('admin/dashboard')->with('message', 'You are now logged in to admin dashboard!');
            }elseif(Auth::user()->role_as == '0'){
                return redirect('/')->with('message', 'You are now logged in!');
            }
            
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }



    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){

                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }


            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}