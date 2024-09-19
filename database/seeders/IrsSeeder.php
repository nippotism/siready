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
        DB::table('irs')->insert([
            ['kode' => 'PAIK6102', 'mata_kuliah' => 'Dasar Pemrograman', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'A204', 'status' => 'BARU', 'nama_dosen' => 'Dr.Eng. Adi Wibowo, S.Si., M.Kom. Khadijah, S.Kom., M.Cs.', 'hari_jam' => 'Senin pukul 15:40 - 18:10', 'semester' => 1],
            ['kode' => 'PAIK6101', 'mata_kuliah' => 'Matematika I', 'kelas' => 'D', 'sks' => 2, 'ruang' => 'B201', 'status' => 'BARU', 'nama_dosen' => 'Prof. Dr. Dra. Sunarsih, M.Si. Solikhin, S.Si., M.Sc.', 'hari_jam' => 'Selasa pukul 13:00 - 14:40', 'semester' => 1],
            ['kode' => 'UUW00005', 'mata_kuliah' => 'Olahraga', 'kelas' => 'B', 'sks' => 1, 'ruang' => 'Lapangan Stadion UNDIP Tembalang', 'status' => 'BARU', 'nama_dosen' => 'Dra. Endang Kumaidah, M.Kes.', 'hari_jam' => 'Rabu pukul 07:00 - 07:50', 'semester' => 1],
            ['kode' => 'UUW00007', 'mata_kuliah' => 'Bahasa Inggris', 'kelas' => 'D', 'sks' => 2, 'ruang' => 'E101', 'status' => 'BARU', 'nama_dosen' => 'Dra. R.A.J. Atrinawati, M.Hum.', 'hari_jam' => 'Rabu pukul 08:50 - 10:30', 'semester' => 1],
            ['kode' => 'PAIK6204', 'mata_kuliah' => 'Aljabar Linier', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'E103', 'status' => 'BARU', 'nama_dosen' => 'Dr. Retno Kusumaningrum, S.Si., M.Kom. Priyo Sidik Sasongko, S.Si., M.Kom. Dr. Aris Sugiharto, S.Si., M.Kom.', 'hari_jam' => 'Selasa pukul 13:00 - 15:30', 'semester' => 2],
            ['kode' => 'UUW00011', 'mata_kuliah' => 'Pendidikan Agama Islam', 'kelas' => 'D', 'sks' => 2, 'ruang' => 'E103', 'status' => 'BARU', 'nama_dosen' => 'Suparno, S.Ag., M.S.I.', 'hari_jam' => 'Selasa pukul 15:40 - 17:20', 'semester' => 2],
            ['kode' => 'PAIK6203', 'mata_kuliah' => 'Organisasi dan Arsitektur Komputer', 'kelas' => 'D', 'sks' => 3, 'ruang' => 'E103', 'status' => 'BARU', 'nama_dosen' => 'Rismiyati, B.Eng, M.Cs Muhammad Malik Hakim, S.T., M.T.I.', 'hari_jam' => 'Rabu pukul 09:40 - 12:10', 'semester' => 2],
            ['kode' => 'PAIK6301', 'mata_kuliah' => 'Struktur Data', 'kelas' => 'C', 'sks' => 3, 'ruang' => 'B203', 'status' => 'BARU', 'nama_dosen' => 'Dr. Rahmat Hidayat, S.Si., M.T.', 'hari_jam' => 'Senin pukul 10:00 - 12:00', 'semester' => 3],
            ['kode' => 'UUW00004', 'mata_kuliah' => 'Bahasa Indonesia', 'kelas' => 'D', 'sks' => 2, 'ruang' => 'K202', 'status' => 'BARU', 'nama_dosen' => 'Dra. Sri Puji Astuti, M.Pd.', 'hari_jam' => 'Kamis pukul 13:00 - 14:40', 'semester' => 2],
        ]);
    }
}
