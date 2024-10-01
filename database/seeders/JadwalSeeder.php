<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['hari' => 1, 'jammulai' => 0, 'jamselesai' => 3, 'ruang' => 'A101', 'kodemk' => 'PAIK6102', 'kelas' => 'A', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 3, 'jamselesai' => 5, 'ruang' => 'A102', 'kodemk' => 'PAIK6102', 'kelas' => 'B', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 3, 'jammulai' => 2, 'jamselesai' => 4, 'ruang' => 'A103', 'kodemk' => 'PAIK6102', 'kelas' => 'C', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 4, 'jammulai' => 3, 'jamselesai' => 7, 'ruang' => 'A103', 'kodemk' => 'PAIK6102', 'kelas' => 'D', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 3, 'jammulai' => 0, 'jamselesai' => 4, 'ruang' => 'A105', 'kodemk' => 'PAIK6105', 'kelas' => 'A', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 4, 'jammulai' => 5, 'jamselesai' => 9, 'ruang' => 'A105', 'kodemk' => 'PAIK6105', 'kelas' => 'B', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 5, 'jammulai' => 0, 'jamselesai' => 4, 'ruang' => 'A105', 'kodemk' => 'PAIK6105', 'kelas' => 'C', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 4, 'jammulai' => 0, 'jamselesai' => 4, 'ruang' => 'A105', 'kodemk' => 'PAIK6105', 'kelas' => 'D', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 0, 'jamselesai' => 4, 'ruang' => 'E101', 'kodemk' => 'PAIK6301', 'kelas' => 'A', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 5, 'jamselesai' => 9, 'ruang' => 'E101', 'kodemk' => 'PAIK6301', 'kelas' => 'B', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 0, 'jamselesai' => 4, 'ruang' => 'E101', 'kodemk' => 'PAIK6301', 'kelas' => 'C', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 3, 'jammulai' => 9, 'jamselesai' => 13, 'ruang' => 'E101', 'kodemk' => 'PAIK6301', 'kelas' => 'D', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 7, 'jamselesai' => 10, 'ruang' => 'E102', 'kodemk' => 'PAIK6302', 'kelas' => 'A', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 4, 'jamselesai' => 7, 'ruang' => 'E102', 'kodemk' => 'PAIK6302', 'kelas' => 'B', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 3, 'jammulai' => 4, 'jamselesai' => 7, 'ruang' => 'E102', 'kodemk' => 'PAIK6302', 'kelas' => 'C', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 4, 'jammulai' => 0, 'jamselesai' => 3, 'ruang' => 'E102', 'kodemk' => 'PAIK6302', 'kelas' => 'D', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 0, 'jamselesai' => 4, 'ruang' => 'E102', 'kodemk' => 'PAIK6501', 'kelas' => 'A', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 0, 'jamselesai' => 4, 'ruang' => 'E102', 'kodemk' => 'PAIK6501', 'kelas' => 'B', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 4, 'jammulai' => 3, 'jamselesai' => 7, 'ruang' => 'E102', 'kodemk' => 'PAIK6501', 'kelas' => 'C', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 3, 'jammulai' => 0, 'jamselesai' => 4, 'ruang' => 'E102', 'kodemk' => 'PAIK6501', 'kelas' => 'D', 'kapasitas' => 50, 'prodi' => 'Informatika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 1, 'jamselesai' => 3, 'ruang' => 'A106', 'kodemk' => 'PAFS6321', 'kelas' => 'A', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 1, 'jamselesai' => 3, 'ruang' => 'A106', 'kodemk' => 'PAFS6321', 'kelas' => 'B', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 4, 'jamselesai' => 7, 'ruang' => 'C301', 'kodemk' => 'PAFS6321', 'kelas' => 'C', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 4, 'jamselesai' => 7, 'ruang' => 'C301', 'kodemk' => 'PAFS6321', 'kelas' => 'D', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 1, 'jamselesai' => 3, 'ruang' => 'D401', 'kodemk' => 'PAFS6322', 'kelas' => 'A', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 1, 'jamselesai' => 3, 'ruang' => 'D401', 'kodemk' => 'PAFS6322', 'kelas' => 'B', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 4, 'jamselesai' => 7, 'ruang' => 'C301', 'kodemk' => 'PAFS6322', 'kelas' => 'C', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 4, 'jamselesai' => 7, 'ruang' => 'C301', 'kodemk' => 'PAFS6322', 'kelas' => 'D', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 7, 'jamselesai' => 9, 'ruang' => 'D401', 'kodemk' => 'PAFS6323', 'kelas' => 'A', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 7, 'jamselesai' => 9, 'ruang' => 'D401', 'kodemk' => 'PAFS6323', 'kelas' => 'B', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 3, 'jamselesai' => 5, 'ruang' => 'A107', 'kodemk' => 'PAFS6323', 'kelas' => 'C', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 3, 'jamselesai' => 5, 'ruang' => 'A107', 'kodemk' => 'PAFS6323', 'kelas' => 'D', 'kapasitas' => 50, 'prodi' => 'Fisika', 'status' => 'Disetujui'],
        ];

        DB::table('jadwal')->insert($data);
    }
}