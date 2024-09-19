<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khs')->insert([
            ['kode' => 'PAIK6102', 'mata_kuliah' => 'Dasar Pemrograman', 'status' => 'BARU', 'sks' => 4, 'nilai' => 'A', 'semester' => 1],
            ['kode' => 'PAIK6101', 'mata_kuliah' => 'Matematika I', 'status' => 'BARU', 'sks' => 2, 'nilai' => 'B', 'semester' => 1],
            ['kode' => 'UUW00005', 'mata_kuliah' => 'Olahraga', 'status' => 'BARU', 'sks' => 1, 'nilai' => 'A', 'semester' => 1],
            ['kode' => 'UUW00007', 'mata_kuliah' => 'Bahasa Inggris', 'status' => 'BARU', 'sks' => 2, 'nilai' => 'C', 'semester' => 1],
            ['kode' => 'PAIK6204', 'mata_kuliah' => 'Aljabar Linier', 'status' => 'BARU', 'sks' => 3, 'nilai' => 'B', 'semester' => 2],
            ['kode' => 'UUW00011', 'mata_kuliah' => 'Pendidikan Agama Islam', 'status' => 'BARU', 'sks' => 2, 'nilai' => 'A', 'semester' => 2],
            ['kode' => 'PAIK6203', 'mata_kuliah' => 'Organisasi dan Arsitektur Komputer', 'status' => 'BARU', 'sks' => 3, 'nilai' => 'C', 'semester' => 2],
            ['kode' => 'UUW00004', 'mata_kuliah' => 'Bahasa Indonesia', 'status' => 'BARU', 'sks' => 2, 'nilai' => 'B', 'semester' => 2],
            ['kode' => 'PAIK6301', 'mata_kuliah' => 'Struktur Data', 'status' => 'BARU', 'sks' => 4, 'nilai' => 'A', 'semester' => 3],
        ]);
    }
}
