<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    use HasFactory;
    protected $table = 'khs';

    protected $fillable = [
        'nim',
        'kode',
        'nilai',
    ];

    public $timestamps = false;
}
