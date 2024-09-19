<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $ruang = [
            ['noruang' => 'A101', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Kelas', 'kapasitas' => '50', 'status' => 'Tersedia'],
            ['noruang' => 'A102', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Kelas', 'kapasitas' => '50', 'status' => 'Tersedia'],
            ['noruang' => 'A103', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Kelas', 'kapasitas' => '50', 'status' => 'Tersedia'],
            ['noruang' => 'A104', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Kelas', 'kapasitas' => '50', 'status' => 'Tersedia'],
            ['noruang' => 'A105', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Kelas', 'kapasitas' => '50', 'status' => 'Tersedia'],
            ['noruang' => 'A106', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Kelas', 'kapasitas' => '50', 'status' => 'Tersedia'],
            ['noruang' => 'A107', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Kelas', 'kapasitas' => '50', 'status' => 'Tersedia'],
            ['noruang' => 'A108', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Kelas', 'kapasitas' => '50', 'status' => 'Tersedia']
        ];

        foreach ($ruang as $p) {
            Ruang::create($p);
        }
        
    }
}
