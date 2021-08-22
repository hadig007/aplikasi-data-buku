<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class PageController extends Controller
{
    public function index()
    {
        $nomor = 1;
        $user = User::all();
        return view('home',compact('user','nomor'));
    }
    public function login()
    {
        return view('login.login');
    }
    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }
        return redirect('/');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    public function register()
    {
        return view('login.register');
    }

    public function postregister(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'karyawan',
            'password' => bcrypt($request->password),
        ]);

        return redirect('/');
    }

    public function users()
    {
        $nomor = 1;
        $user = User::all();
        return view('admin.users',compact('user','nomor'));
    }
}
