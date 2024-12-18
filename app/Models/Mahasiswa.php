<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'no_telp',
        'jenis_kelamin',
        'tanggal_lahir',
        'nip_doswal',
        'prodi',
        'jalur_masuk',
        'angkatan',
        'ipk',
        'ips',
        'alamat',
        'status',
    ];
}
