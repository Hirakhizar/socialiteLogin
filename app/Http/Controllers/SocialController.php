<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Contracts\Concurrency\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function socialLogin($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    public function socialAuthentication($provider)
    {
        try {
            

            if ($provider) {

                $socialUser = Socialite::driver($provider)->user();
               
                $user = User::where('auth_provider_id', $socialUser->id)->first();
                if ($user) {
                    Auth::login($user);
                    return redirect()->route('dashboard');

                } else {
                    $newUser = User::create([
                        'name' => $socialUser->name,
                        'email' => $socialUser->email,
                        'password' => Hash::make('88888888'),
                        'auth_provider_id' => $socialUser->id,
                        'auth_provider' => $provider
                    ]);

                    if ($newUser) {
                        Auth::login($newUser);
                        return redirect()->route('dashboard');
                    }

                }
            }
            abort(404);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
