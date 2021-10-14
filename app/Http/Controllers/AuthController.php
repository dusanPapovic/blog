<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function getRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated(); // niz podataka vraca
        $data['password'] = Hash::make($data['password']);
        // info($data);
        $newUser = User::create($data);  // create prima niz

        auth()->login($newUser);

        return redirect('/posts');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }

    public function getLoginBlade()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (auth()->attempt($credentials)) {
            return redirect('/posts');
        }
        return view('auth.login', ['invalid_credentials' => true]);
    }
}
