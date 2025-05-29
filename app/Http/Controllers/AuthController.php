<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    protected $baseUrl;
    public function __construct()
    {
        $this->baseUrl = config('services.mockapi.base_url');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $res = Http::get("{$this->baseUrl}/users")->json();

        $user = collect($res)->firstWhere('email', $request->email);

        if ($user && $user['password'] === $request->password) {
            session(['user' => $user]);
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function register(Request $request)
    {

        $user = Http::post("{$this->baseUrl}/users", $request->only('name', 'email','password'))->json();

        session(['user' => $user]);

        return redirect('/');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }
}
