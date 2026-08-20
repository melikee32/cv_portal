<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Client\Request;
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
            'name'     => ' required | string | max:255 ',
            'email'    => ' required | email  | uniqe: users, email ',
            'password' => ' required | min:6  | confirmed ',
            'role'     => ' required | in:candidate, employer ',
        ]);


        //create new user
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
        ->with('success', 'Kayır Başarılı✔. Giriş yapabilirsiniz!' );
    }
}
