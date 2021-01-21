<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('pages.index');
        }
        return view('authentication.login');
    }

    public function login()
    {
        $user = User::where('username', request('username'))->first();
        if ($user == null) {
            return redirect()->back()->with('ERR', 'Username tidak terdaftar.');
        }

        if (!Auth::attempt(['username' => $user->username, 'password' => request('password')])) {
            return redirect()->back()->with('ERR', 'Password salah.');
        }

        return redirect()->route('pages.index');
    }
    public function register(){
        $checkUsername = User::where('username', request('username'))->first();
        if ($checkUsername != null){
            return redirect()->back()->with('ERR','Username Telah Digunakan !');
        } else {
            User::create([
                'name'=>request('name'),
                'username'=>request('username'),
                'password'=>request('password')
            ]);
            return redirect()->back()->with('OK','username berhasil ditambahkan !');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
