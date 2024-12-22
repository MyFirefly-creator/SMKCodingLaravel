<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $fillable = [
        'kategori',
        'UserID',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'KategoriID');
    }
}
