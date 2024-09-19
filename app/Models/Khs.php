<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    use HasFactory;
    protected $table = 'khs';

    protected $fillable = [
        'kode',
        'mata_kuliah',
        'status',
        'sks',
        'semester',
        'nilai',
    ];

    public $timestamps = false;
}
