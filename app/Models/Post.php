<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari bentuk jamak model
    protected $table = 'posts';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'image',
        'konten',
        'deskripsi',
        'UserID',
        'isi_deskripsi',
        'KategoriID',
    ];

    // Hubungan dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    // Hubungan dengan model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'KategoriID');
    }
}
