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
            ['kodemk' => 'PAIK6101', 'nama' => 'Matematika I', 'program_studi' =>'Informatika', 'plotsemester' => 1, 'sks' => 2, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6102', 'nama' => 'Dasar Pemrograman', 'program_studi' =>'Informatika', 'plotsemester' => 1, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6103', 'nama' => 'Dasar Sistem', 'program_studi' =>'Informatika', 'plotsemester' => 1, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6104', 'nama' => 'Logika Informatika', 'program_studi' =>'Informatika', 'plotsemester' => 1, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6105', 'nama' => 'Struktur Diskrit', 'program_studi' =>'Informatika', 'plotsemester' => 1, 'sks' => 4, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'UUW00003', 'nama' => 'Pancasila dan Kewarganegaraan', 'program_studi' =>'Informatika', 'plotsemester' => 1, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'UUW00005', 'nama' => 'Olahraga', 'program_studi' =>'Informatika', 'plotsemester' => 1, 'sks' => 1, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'UUW00007', 'nama' => 'Bahasa Inggris', 'program_studi' =>'Informatika', 'plotsemester' => 1, 'sks' => 2, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6201', 'nama' => 'Matematika II', 'program_studi' =>'Informatika', 'plotsemester' => 2, 'sks' => 2, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6202', 'nama' => 'Algoritma dan Pemrograman', 'program_studi' =>'Informatika', 'plotsemester' => 2, 'sks' => 4, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAIK6203', 'nama' => 'Organisasi dan Arsitektur Komputer', 'program_studi' =>'Informatika', 'plotsemester' => 2, 'sks' => 3, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAFS6321', 'nama' => 'Fisika Dasar II', 'program_studi' => 'Fisika', 'plotsemester' => 2, 'sks' => 4, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAFS6322', 'nama' => 'Praktikum Fisika Dasar II', 'program_studi' => 'Fisika', 'plotsemester' => 2, 'sks' => 1, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAFS6323', 'nama' => 'Fisika Matematika I', 'program_studi' => 'Fisika', 'plotsemester' => 2, 'sks' => 4, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAFS6324', 'nama' => 'Termodinamika', 'program_studi' => 'Fisika', 'plotsemester' => 2, 'sks' => 4, 'sifat' => 'W', 'jumlah_kelas' => 4],
            ['kodemk' => 'PAFS6325', 'nama' => 'Gelombang', 'program_studi' => 'Fisika', 'plotsemester' => 2, 'sks' => 2, 'sifat' => 'W', 'jumlah_kelas' => 4],
        ]);
    }
}
