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
       <div class="container mt-4">
       <h4>
            Data Lengkap {{ $user->name }}
        </h4><hr>
        <div class="boxuser shadow-sm mb-5rounded">
            <form action="" method="get">
                <div class="mb-3 row ">
                    <h4 class="col-sm-4">ID User</h4>
                    <h4 class="col-sm-8">{{ $user->id }}</h4>
                </div><hr>
                <div class="mb-3 row ">
                    <h4 class="col-sm-4">Nama</h4>
                    <h4 class="col-sm-8">{{ $user->name }}</h4>
                </div><hr>
                <div class="mb-3 row ">
                    <h4 class="col-sm-4">Level</h4>
                    <h4 class="col-sm-8">{{ $user->level }}</h4>
                </div><hr>
                <div class="mb-3 row ">
                    <h4 class="col-sm-4">Email</h4>
                    <h4 class="col-sm-8">{{ $user->email }}</h4>
                </div><hr>
                <div class="mb-3 row ">
                    <h4 class="col-sm-4">Alamat</h4>
                    <h4 class="col-sm-8">{{ $user->profile->alamat }}</h4>
                </div><hr>
                <div class="mb-3 row ">
                    <h4 class="col-sm-4">No. Kontak</h4>
                    <h4 class="col-sm-8">{{ $user->profile->phone }}</h4>
                </div><hr>
            </form>
        </div>
       </div>
    </main>
</body>
</html>