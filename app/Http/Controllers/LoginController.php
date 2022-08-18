<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author;

class LoginController extends Controller
{
    // login view
    public function login() {
        return view('login');
    }
    // login proses
    public function loginproses (Request $request) {
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
        return \redirect('login');
    }


    // register view
    public function register() {
        return view(('register'));
    }
    // register proses
    public function registeruser (Request $request) {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }

    // logout
    public function logout() {
        Auth::logout();
        return \redirect('login');
    }
}
