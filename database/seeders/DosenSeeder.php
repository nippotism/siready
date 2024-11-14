<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosen = [
            ['nip' => '1234567890', 'nama' => 'Muhaimin Iskandar', 'email' => 'muhaimin@gmail.com', 'no_telp' => '08123456789'],
            ['nip' => '1234567891', 'nama' => 'Anies Baswedan', 'email' => 'anies@gmail.com', 'no_telp' => '08123456790'],
            ['nip' => '1234567892', 'nama' => 'Mahfud MD', 'email' => 'mahfud@gmail.com', 'no_telp' => '08123456791'],
            ['nip' => '1234567893', 'nama' => 'Airlangga Hartarto', 'email' => 'airlangga@gmail.com', 'no_telp' => '08123456792'],
            ['nip' => '1234567894', 'nama' => 'Bahlil Lahadalia', 'email' => 'bahlil@gmail.com', 'no_telp' => '08123456793'],
        ];

        DB::table('dosen')->insert($dosen);
    }
}
