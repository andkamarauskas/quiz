<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravel\Socialite\Facades\Socialite as Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function google() 
    {
        return Socialite::driver('google')->redirect();
    }
    public function facebook() 
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function googleCallback() 
    {
        try
        {
            $google = Socialite::driver('google')->user(); 
        }
        catch(Exception $e)
        {
            return redirect('/'); 
        } 

        $user = User::where('social_id', $google->getId())->first();

        if(!$user)
        {
            $user = User::create([ 
               'social_id' => $google->getId(), 
               'name' => $google->getName(), 
               'email' => $google->getEmail(), 
               'password' => bcrypt($google->getId()), 
               'profile_pic' => $google->getAvatar(), 
           ]); 
        } 
        auth()->login($user);
        #return redirect()->to('/home'); 
        return redirect()->intended('/'); 
    }

    public function facebookCallback() 
    {
        try
        {
            $facebook = Socialite::driver('facebook')->user(); 
        }
        catch(Exception $e)
        {
            return redirect('/'); 
        } 
        $user = User::where('social_id', $facebook->getId())->first();

        if(!$user)
        {
            $user = User::create([ 
               'social_id' => $facebook->getId(), 
               'name' => $facebook->getName(), 
               'email' => $facebook->getEmail(), 
               'password' => bcrypt($facebook->getId()), 
               'profile_pic' => $facebook->getAvatar(), 
           ]); 
        } 
        auth()->login($user);
        #return redirect()->to('/home'); 
        return redirect()->intended('/'); 
    }
}
