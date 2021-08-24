<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $nomor = 1;
        $user = User::all();
        $buku = Buku::all();
        return view('home',[
            'user' => DB::table('users')->paginate(15)
        ],compact('user','nomor','buku'));
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

    public function editaccount(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile()->update([
            'alamat' => $request->alamat,
            'phone' => $request->phone
            ]
        ); // dd($user);
        return redirect('/home');
    }
    // public function editaccount(Request $request,$id)
    // {
    //     $user = User::find($id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->profile()->alamat = $request->alamat;
    //     $user->profile()->phone = $request->phone;
    //     $user->save();
    //     // dd($user);
    //     return redirect('/home');
    // }
    public function userdetail($id)
    {
        $user = User::findOrFail($id);
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

    public function editbuku($id)
    { 
        $buku = Buku::find($id);
        return view('user.edit-buku',compact('buku'));
    }
    public function post_editbuku(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->judul_buku = $request->judul_buku;
        $buku->penulis_buku = $request->penulis_buku;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->update();
        return redirect()->route('home');
    }
}
