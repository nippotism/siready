<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            ['kodemk' => 'PAIK6101', 'nama' => 'Matematika I', 'plotsemester' => 1, 'sks' => 2, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6102', 'nama' => 'Dasar Pemrograman', 'plotsemester' => 1, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6103', 'nama' => 'Dasar Sistem', 'plotsemester' => 1, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6104', 'nama' => 'Logika Informatika', 'plotsemester' => 1, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6105', 'nama' => 'Struktur Diskrit', 'plotsemester' => 1, 'sks' => 4, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'UUW00003', 'nama' => 'Pancasila dan Kewarganegaraan', 'plotsemester' => 1, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'UUW00005', 'nama' => 'Olahraga', 'plotsemester' => 1, 'sks' => 1, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'UUW00007', 'nama' => 'Bahasa Inggris', 'plotsemester' => 1, 'sks' => 2, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6201', 'nama' => 'Matematika II', 'plotsemester' => 2, 'sks' => 2, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6202', 'nama' => 'Algoritma dan Pemrograman', 'plotsemester' => 2, 'sks' => 4, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6203', 'nama' => 'Organisasi dan Arsitektur Komputer', 'plotsemester' => 2, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
        ]);
    }
}
