<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Data User</title>
</head>
<body>
    <header>
        <h2>APLIKASI LATIHAN : DATA BUKU</h2>
        <nav>
            <a href="/home">Home</a>
            @if(auth()->user()->level == "admin")
            <a href="">User</a>
            @endif
            <form class="logout" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </nav>
    </header>

    <main>
        <div class="container">
            <a href="{{ route('account') }}" class="akun btn btn-info">{{ auth()->user()->name }} 
                <span><i class="fas fa-user-circle"></i></span>
            </a>
            <h2>List of Users ({{ $user->count()}})</h2>
            <table class="table table-striped table-bordered">
               
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $us)
                    <tr>
                        <td>{{ $nomor++ }}</td>
                        <td>{{ $us->name }}</td>
                        <td>{{ $us->email }}</td>
                        <td>{{ $us->level }}</td>
                        <td>
                            <form action="{{ route('userdetail',['id' => $us->id]) }}" method="get">
                                <button type="submit" class="btn btn-info">Detail</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>