<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $irs = [
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6101', 'mata_kuliah' => 'Matematika I', 'kelas' => 'D', 'sks' => 2, 'ruang' => 'B201', 'status' => 'Disetujui', 'hari_jam' => 'Selasa, 13.00 - 14.30', 'semester' => 1],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6102', 'mata_kuliah' => 'Dasar Pemrograman', 'kelas' => 'D', 'sks' => 4, 'ruang' => 'A204', 'status' => 'Disetujui', 'hari_jam' => 'Senin, 15.40 - 18.10', 'semester' => 1],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6103', 'mata_kuliah' => 'Dasar Sistem', 'kelas' => 'D', 'sks' => 4, 'ruang' => 'E103', 'status' => 'Disetujui', 'hari_jam' => 'Kamis, 13.00  - 15.30', 'semester' => 1],
            ['email' => 'yoga@gmail.com', 'kode' => 'UUW00005', 'mata_kuliah' => 'Olahraga', 'kelas' => 'B', 'sks' => 1, 'ruang' => 'Lapangan Stadion UNDIP Tembalang', 'status' => 'Disetujui', 'hari_jam' => 'Rabu, 07.00 - 07.50', 'semester' => 1],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6201', 'mata_kuliah' => 'Matematika II', 'kelas' => 'D', 'sks' => 2, 'ruang' => 'E103', 'status' => 'Disetujui', 'hari_jam' => 'Jumat, 13.00  - 14.00', 'semester' => 2],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6202', 'mata_kuliah' => 'Algoritma dan Pemrograman', 'kelas' => 'D', 'sks' => 4, 'ruang' => 'E103', 'status' => 'Disetujui', 'hari_jam' => 'Senin, 15.40 - 18.10', 'semester' => 2],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6204', 'mata_kuliah' => 'Aljabar Linier', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'E103', 'status' => 'Disetujui', 'hari_jam' => 'Selasa, 13.00 - 15.30', 'semester' => 2],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6402', 'mata_kuliah' => 'Jaringan Komputer', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'E103', 'status' => 'Disetujui', 'hari_jam' => 'Kamis, 07.00 - 09.30', 'semester' => 2],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6301', 'mata_kuliah' => 'Struktur Data', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'E102', 'status' => 'Disetujui', 'hari_jam' => 'Senin, 07.00 - 16.20', 'semester' => 3],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6302', 'mata_kuliah' => 'Sistem Operasi', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'E102', 'status' => 'Disetujui', 'hari_jam' => 'Rabu, 13.00 - 15.30', 'semester' => 3],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6303', 'mata_kuliah' => 'Basis Data', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'K102', 'status' => 'Disetujui', 'hari_jam' => 'Selasa, 07.00 - 10.20', 'semester' => 3],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6506', 'mata_kuliah' => 'Keamanan dan Jaminan Informasi', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'K102', 'status' => 'Disetujui', 'hari_jam' => 'kamis, 07.00 - 09.30', 'semester' => 3],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6401', 'mata_kuliah' => 'Pemrograman Berorientasi Objek', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'E101', 'status' => 'Disetujui', 'hari_jam' => 'Selasa, 13.00 - 15.30', 'semester' => 4],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6403', 'mata_kuliah' => 'Manajemen Basis Data', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'A303', 'status' => 'Disetujui', 'hari_jam' => 'Rabu, 07.00 - 09.30', 'semester' => 4],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6406', 'mata_kuliah' => 'Sistem Cerdas', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'A303', 'status' => 'Disetujui', 'hari_jam' => 'Senin, 09.40 - 12.10', 'semester' => 4],
            ['email' => 'yoga@gmail.com', 'kode' => 'PAIK6406', 'mata_kuliah' => 'Jumat', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'A303', 'status' => 'Disetujui', 'hari_jam' => 'Senin, 07.00 - 09.30', 'semester' => 4],
        ];
        DB::table('irs')->insert($irs);
    }
}
