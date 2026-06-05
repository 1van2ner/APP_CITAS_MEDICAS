<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        
        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'google_id'=> $googleUser->getId(),
            'password' => bcrypt('password_por_defecto') 
        ]);

        Auth::login($user);

        return redirect('/home');
    }

    public function handleGithubCallback()
    {
        // Obtener la información del usuario desde GitHub
        $githubUser = Socialite::driver('github')->user();

        // Buscar al usuario en tu base de datos o crearlo si no existe
        $user = User::updateOrCreate([
            'email' => $githubUser->getEmail(),
        ], [
            'name' => $githubUser->getName() ?? $githubUser->getNickname(),
            'github_id' => $githubUser->getId(),
            'password' => encrypt('password-temporal'), // O maneja la contraseña de otra forma
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

}
