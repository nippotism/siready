<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irstest extends Model
{
    use HasFactory;
    protected $table = 'irs_test';

    protected $fillable = [
        'email',
        'kodejadwal',
        'kodemk',
        'prioritas',
        'status',
        'semester'
    ];
}
