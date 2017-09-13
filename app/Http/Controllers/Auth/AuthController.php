<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use Validator;
use App\Http\Controllers\Controller;
use Socialite;
use DB; 
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255|unique:usuario',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function loginFacebook()
    {
        return \Socialite::driver('facebook')->redirect();
    }
    public function facebookCallback()
    {
        $userSocial = \Socialite::driver('facebook')->stateless()->user();
        $user = Usuario::where('email',$userSocial->email)->first();
        if (!$user) {
            $user = Usuario::create([
                'nome' => $userSocial->name,
                'email' => $userSocial->email,
                'genero' => $userSocial->user->gender,      
                'link_facebook' => $userSocial->profileUrl,          
            ]);
            \Auth::login($user);    
            return redirect('/perfil/editar/');            
        } else {
            \Auth::login($user);    
            return redirect('/');
        }
    }
    public function loginGoogle()
    {
        return \Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
        $userSocial = \Socialite::driver('google')->stateless()->user();
        $user = Usuario::where('email',$userSocial->email)->first();
        if (!$user) {
            $user = Usuario::create([
                'nome' => $userSocial->name,
                'email' => $userSocial->email,
                'genero' => $userSocial->user->gender,                
            ]);
            \Auth::login($user);
            return redirect('/perfil/editar/');
        }else
        {   
            \Auth::login($user);
            return redirect('/');
        }
    }
}
