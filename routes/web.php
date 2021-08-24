<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[PageController::class,'login'])->name('login');
Route::get('/register',[PageController::class,'register'])->name('register');
Route::get('/postregister',[PageController::class,'postregister'])->name('postregister');
Route::post('/postlogin',[PageController::class,'postlogin'])->name('postlogin');
Route::post('/logout',[PageController::class,'logout'])->name('logout');


Route::group(['middleware'=>['auth','ceklevel:admin,karyawan']],function(){
    Route::get('/home',[PageController::class,'index'])->name('home');
    Route::get('/account',[PageController::class,'account'])->name('account');
    Route::get('/editaccount/{id}',[PageController::class,'editaccount'])->name('editaccount');
    
});
Route::group(['middleware'=>['auth','ceklevel:admin']],function(){
    Route::get('/home/users',[PageController::class,'users'])->name('users');
    Route::get('/home/users/detail/{id}',[PageController::class,'userdetail'])->name('userdetail');
});
Route::group(['middleware'=>['auth','ceklevel:karyawan']],function(){
    Route::get('/add',[PageController::class,'add'])->name('add');
    Route::get('/storebuku',[PageController::class,'storebuku'])->name('storebuku');
    Route::get('/editbuku/{id}',[PageController::class,'editbuku'])->name('editbuku');
    Route::get('/post_editbuku/{id}',[PageController::class,'post_editbuku'])->name('post_editbuku');
    Route::get('/hapusbuku/{id}',[PageController::class,'hapusbuku'])->name('hapusbuku');
});
// Route::get('/add-user', function(){
//     $user = User::create([
//         'name' => 'hery',
//         'level' => 'admin',
//         'email' => 'hery@gmail.com',
//         'password' => bcrypt('admin')
//     ]);

//     return "user has successfully added";
// });
