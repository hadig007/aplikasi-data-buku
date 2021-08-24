<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a href="{{ route('account') }}" class="akun btn btn-secondary">{{ auth()->user()->name }} 
                <span><i class="fas fa-user-circle"></i></span>
            </a>
            <h2>Data Buku</h2>
             @if(auth()->user()->level == "karyawan")
            <a href="{{ route('add') }}" class="btn btn-primary m-2">Tambah Buku</a>
            @endif
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID Buku</th>
                        <th>Nama Buku</th>
                        <th>Inputer</th>
                        @if(auth()->user()->level == "karyawan")
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($buku as $bk)
                   <tr>
                        <td>{{ $nomor++ }}</td>
                        <td>{{ $bk->id }}</td>
                        <td>{{ $bk->judul_buku }}</td>
                        <td>{{ $bk->user->name}}</td>
                        @if(auth()->user()->level == "karyawan")
                        <td><form action="/hapusbuku/{{$bk->id}}" method="get">@csrf
                            <button class="btn btn-danger">Delete</button>
                            <a href="/editbuku/{{$bk->id}}" class="btn btn-info">Edit</a>
                        </form>
                        <!-- <a class="btn btn-transparent d-flex flex-row" href="">edit</a> -->
                        <!-- <a href=""><span style="font-size: 1.15em; color: red;"><i class="fas fa-trash-alt"></i></a> -->
                        </td>
                        @endif
                   </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $user->links() }}
        </div>
    </main>
</body>
</html>