<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $table = 'ruang';

    protected $fillable = [
        'noruang',
        'blokgedung',
        'lantai',
        'fungsi',
        'kapasitas',
        'status',
        'prodi'
    ];

}
