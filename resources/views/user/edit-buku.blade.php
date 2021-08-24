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
            <a href="/home">Home</a>
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
       <div class="container">
       <h2>
            Tambah data buku disini
        </h2><hr>
        <form action="/post_editbuku/{{$buku->id}}" method="get">
            @csrf
            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" id="judul_buku" value="{{ $buku->judul_buku }}">
            </div>
            <div class="form-group">
                <label for="penulis_buku">Penulis Buku</label>
                <input type="text" name="penulis_buku" class="form-control" id="penulis_buku" value="{{ $buku->penulis_buku }}">
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ $buku->penerbit }}">
            </div>
            <div class="form-group">
                <label for="jumlah_halaman">Jumlah Halaman</label>
                <input type="text" name="jumlah_halaman" class="form-control" id="jumlah_halaman" value="{{ $buku->jumlah_halaman }}">
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="date" name="tahun_terbit" class="form-control" id="tahun_terbit" value="{{ $buku->tahun_terbit }}">
            </div>
            <button type="submit" class="btn btn-primary px-3 ml-5">Simpan</button>
            <a href="/home" class="btn btn-warning">Batal</a>
        </form>
       </div>
    </main>
</body>
</html>