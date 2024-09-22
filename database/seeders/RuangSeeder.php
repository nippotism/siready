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
            ['noruang' => 'A101', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Informatika'],
            ['noruang' => 'A102', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Informatika'],
            ['noruang' => 'A103', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Informatika'],
            ['noruang' => 'A104', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Biologi'],
            ['noruang' => 'A105', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Biologi'],
            ['noruang' => 'A106', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Matematika'],
            ['noruang' => 'A107', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Matematika'],
            ['noruang' => 'A108', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Informatika'],
            ['noruang' => 'B201', 'blokgedung' => 'B', 'lantai' => '2', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Informatika'],
            ['noruang' => 'B202', 'blokgedung' => 'B', 'lantai' => '2', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Statistika'],
            ['noruang' => 'C301', 'blokgedung' => 'C', 'lantai' => '3', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Matematika'],
            ['noruang' => 'C302', 'blokgedung' => 'C', 'lantai' => '3', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Informatika'],
            ['noruang' => 'D401', 'blokgedung' => 'D', 'lantai' => '4', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Matematika'],
            ['noruang' => 'D402', 'blokgedung' => 'D', 'lantai' => '4', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Statistika'],
            ['noruang' => 'E501', 'blokgedung' => 'E', 'lantai' => '5', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Statistika'],
            ['noruang' => 'E502', 'blokgedung' => 'E', 'lantai' => '5', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Pending', 'prodi' => 'Informatika']
        ];

        foreach ($ruang as $p) {
            Ruang::create($p);
        }
        
    }
}
