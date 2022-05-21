<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleLoginController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     * 
     */

    protected $stateless = false;

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('dashboard');
    }

    protected function _registerOrLoginUser($data)
    {
        // dd($data);
         $user = User::where('email', '=', $data->email)->first();
         if(!$user)
         {
             $name = explode(' ', $data->name);
             $user = new User();
             $user->firstname = $name[0];
             $user->lastname = isset($name[1])?$name[1] : '';
             $user->email = $data->email;
             $user->image_flag = 0;
             $user->login_type = 2;
             $user->role = 0;
             $user->password = bcrypt('12345678');
             $user->provider_id = $data->id;
             $user->save();
         }

         Auth::login($user);
    }

    public function stateless()
    {
        $this->stateless = true;

        return $this;
    }
}
