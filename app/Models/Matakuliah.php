<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        'kodemk',
        'nama',
        'program_studi',
        'plotsemester',
        'sks',
        'sifat',
        'jumlah_kelas',
    ];
}
