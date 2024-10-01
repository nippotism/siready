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
            ['noruang' => 'A101', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika'],
            ['noruang' => 'E101', 'blokgedung' => 'E', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika'],
            ['noruang' => 'A102', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika'],
            ['noruang' => 'E102', 'blokgedung' => 'E', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika'],
            ['noruang' => 'E103', 'blokgedung' => 'E', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika'],
            ['noruang' => 'A103', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika'],
            ['noruang' => 'A104', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Biologi'],
            ['noruang' => 'A105', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Biologi'],
            ['noruang' => 'A106', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Fisika'],
            ['noruang' => 'A107', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Fisika'],
            ['noruang' => 'A108', 'blokgedung' => 'A', 'lantai' => '1', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika'],
            ['noruang' => 'B201', 'blokgedung' => 'B', 'lantai' => '2', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika'],
            ['noruang' => 'B202', 'blokgedung' => 'B', 'lantai' => '2', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Statistika'],
            ['noruang' => 'C301', 'blokgedung' => 'C', 'lantai' => '3', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Fisika'],
            ['noruang' => 'C302', 'blokgedung' => 'C', 'lantai' => '3', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika'],
            ['noruang' => 'D401', 'blokgedung' => 'D', 'lantai' => '4', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Fisika'],
            ['noruang' => 'D402', 'blokgedung' => 'D', 'lantai' => '4', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Statistika'],
            ['noruang' => 'E501', 'blokgedung' => 'E', 'lantai' => '5', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Statistika'],
            ['noruang' => 'E502', 'blokgedung' => 'E', 'lantai' => '5', 'fungsi' => 'Ruang Kelas', 'kapasitas' => '50', 'status' => 'Disetujui', 'prodi' => 'Informatika']
        ];

        foreach ($ruang as $p) {
            Ruang::create($p);
        }
        
    }
}