<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;

class PageController extends Controller
{
    public function index()
    {
        $nomor = 1;
        $user = User::all();
        $buku = Buku::all();
        return view('home',compact('user','nomor','buku'));
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

        return view('admin.users',compact('user','nomor',));
    }

    public function account()
    {
        $user = User::all();
        return view('account',compact('user'));
    }

    public function editaccount(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        return redirect('/account');
    }
    public function userdetail()
    {
        $user = User::all();
        return view('admin.userdetail',compact('user'));
    }

    public function add()
    {
        return view('user.add');
    }

    public function storebuku(Request $request)
    {
        // dd(auth()->user()->name);
        // $user = auth()->user()->id;
        $new_buku = Buku::create([
            'judul_buku' => $request->judul_buku,
            'penulis_buku' => $request->penulis_buku,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_halaman' => $request->jumlah_halaman,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('home');
    }

    public function hapusbuku($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->route('home');
    }

}
