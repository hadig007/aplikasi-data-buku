<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = [
        'user_id',
        'judul_buku',
        'penulis_buku',
        'penerbit',
        'tahun_terbit',
        'jumlah_halaman',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
