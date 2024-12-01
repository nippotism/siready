<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irs extends Model
{
    use HasFactory;

    protected $table = 'irs';

    protected $fillable = [
        'email',
        'kode',
        'mata_kuliah',
        'kelas',
        'sks',
        'ruang',
        'status',
        'nama_dosen',
        'hari_jam',
        'semester'
    ];

    public $timestamps = false;
}
