<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User as UserRequest;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{

    public function login()
    {
        return view('account.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('account.register');
    }

    public function store(UserRequest $userRequest)
    {
        $user = User::create($userRequest->all());

        return redirect()->route('login')->with('success', "Votre compte a été bien créé ! Vous pouvez vous connecter !");
    }

    public function profile()
    {
        return view('account.profile');
    }

    public function update_profile(Request $request, User $user)
    {
        $validation = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'picture' => ['required', 'url'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
            'introduction' => ['required', 'min:20'],
            'description' => ['required', 'min:100']
        ]);


        $user->update($validation);

        return redirect()->route('profile')->with('success', "Votre profil a été bien modifié !");

    }

    public function password()
    {
        return view('account.password');
    }

    public function update_password(Request $request)
    {

        $request->validate([
            'ancien' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        User::whereId(Auth::user()->id)->update(['password' => Hash::make($request->password, ['rounds' => 12])]);

        return redirect()->route('home.index')->with('success', "Votre mot de passe a été bien modifié !");
    }

    public function myAccount()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }
}
