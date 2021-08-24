<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Data Buku</title>
</head>
<body>
    <header>
        <h2>APLIKASI LATIHAN : DATA BUKU</h2>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            @if(auth()->user()->level == "admin")
            <a href="{{ route('users') }}">Users</a>
            @endif
            <form class="logout" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </nav>
    </header>
    

    <main>
        <div class="container mt-3">
            <h6>
                Hi, {{ auth()->user()->name }}
            </h6>
            <h1 class="text-bold">Akun anda</h1>
            <hr>
            <form action="{{ route('editaccount',['id'=>auth()->id()]) }}" method="get">
                @csrf
                <div class="form-group">
                <label for="id">ID anda</label>
                <input type="text" name="id" class="form-control" Disabled id="id" value="{{ auth()->id() }}">
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ auth()->user()->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="{{ auth()->user()->email }}">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" name="level" class="form-control" Disabled id="level" value="{{ auth()->user()->level }}">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ auth()->user()->profile->alamat }}">
            </div>
            <div class="form-group">
                <label for="phone">No. Kontak</label>
                <input type="number" name="phone" class="form-control" id="phone" value="{{ auth()->user()->profile->phone }}">
            </div>
            <button type="submit" class="btn btn-primary px-3 ml-5">Simpan Perubahan</button>
            <a href="/home" class="btn btn-warning">Batal</a>
            </form>
        </div>
    </main>
</body>
</html>