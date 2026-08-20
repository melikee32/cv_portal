<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    //registration form
    public function showRegister()
    {
        return view('auth.register');
    }


    //new user registration process
    public function register(Request $request)
    {
        //Verify the data from the form.
        $validated = $request->validate([
            'name'     => 'required | string | max:255',
            'email'    => 'required | email  | uniqe: users, email',
            'password' => 'required | min:6  | confirmed',
            'role'     => 'required | in:candidate,employer',
        ]);


        //create new user , database
        $user = User::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],

            //password hashing process , save to database
            'password' => Hash::make($validated['password']),

            //register user role
            'role'     => $validated['role'],
        ]);


        //After completing the registration, you will be sent to the login page.
        return redirect('login')
            ->with('success', 'Kayır Başarılı✔. Giriş yapabilirsiniz!');
    }


    //login page
    public function showLogin()
    {
        return view('auth.login');
    }


    //login process
    public function login(Request $request)
    {
        //Verify the information in the login form.
        $credentials = $request->validate([
            'email'    => ' required | email',
            'password' => ' required',
        ]);

        //Laravel compares the given email and password against, user table
        if (Auth::attempt($credentials)) {
            //The session ID is renewed to protect against session fixation attacks.
            $request->session()->regenerate();

            return redirect('/dashboard')
                ->with('success', 'Giriş başarılı!');
        }

        //If your email or password is incorrect, return to the login page.
        return back()
            ->withErrors(['email' => 'Email veya şifre hatalı!',])->onlyInput('email');
    }

    //logout 
    public function logout(Request $request)
    {
        //Log out of the user session.
        Auth::logout();

        //Clear session information.
        $request->session()->invalidate();

        //Create a new CSRF token.
        $request->session()->regenerateToken();

        //Send back to the login page.
        return redirect('login')
            ->with('success', 'Başarıyla çıkış yaptınız!');
    }
}
