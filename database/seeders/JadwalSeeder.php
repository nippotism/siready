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
            ['hari' => 1, 'jammulai' => 0, 'jamselesai' => 3, 'ruang' => 'A101', 'kodemk' => 'PAIK6102', 'kelas' => 'A', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 3, 'jamselesai' => 5, 'ruang' => 'A102', 'kodemk' => 'PAIK6102', 'kelas' => 'B', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 3, 'jammulai' => 2, 'jamselesai' => 4, 'ruang' => 'A103', 'kodemk' => 'PAIK6102', 'kelas' => 'C', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 4, 'jammulai' => 3, 'jamselesai' => 7, 'ruang' => 'A104', 'kodemk' => 'PAIK6102', 'kelas' => 'D', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 5, 'jammulai' => 4, 'jamselesai' => 6, 'ruang' => 'A105', 'kodemk' => 'PAIK6105', 'kelas' => 'A', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 5, 'jammulai' => 4, 'jamselesai' => 6, 'ruang' => 'A105', 'kodemk' => 'PAIK6105', 'kelas' => 'B', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 5, 'jammulai' => 4, 'jamselesai' => 6, 'ruang' => 'A105', 'kodemk' => 'PAIK6105', 'kelas' => 'C', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 5, 'jammulai' => 4, 'jamselesai' => 6, 'ruang' => 'A105', 'kodemk' => 'PAIK6105', 'kelas' => 'D', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 5, 'jammulai' => 3, 'jamselesai' => 4, 'ruang' => 'E101', 'kodemk' => 'UUW00003', 'kelas' => 'A', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 3, 'jammulai' => 1, 'jamselesai' => 4, 'ruang' => 'E102', 'kodemk' => 'UUW00005', 'kelas' => 'B', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 1, 'jammulai' => 5, 'jamselesai' => 6, 'ruang' => 'E103', 'kodemk' => 'UUW00007', 'kelas' => 'D', 'kapasitas' => 40, 'status' => 'Disetujui'],
            ['hari' => 2, 'jammulai' => 8, 'jamselesai' => 9, 'ruang' => 'A303', 'kodemk' => 'PAIK6201', 'kelas' => 'A', 'kapasitas' => 40, 'status' => 'Disetujui'],
        ];

        DB::table('jadwal')->insert($data);
    }
}
