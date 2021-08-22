<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="box">
        <div class="login">
            <h1 class="text-center">Register Form</h1>
            <hr>
            <form action="{{ route('postregister') }}" method="get">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="name" name="name" class="form-control" id="name" placeholder="masukkan nama anda">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="masukkan email anda">
                </div>
                <div class="form-group">
                    <label for="password">Sandi</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="masukkan password anda">
                </div>
                <span>Have an Account?<a href="/login" class="text-white">Login</a></span>
                <button type="submit" class="btn btn-warning px-3 ml-2">Register</button>
            </form>
        </div>
    </div> 
</body>
</html>