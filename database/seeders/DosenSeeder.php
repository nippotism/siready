<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosen = [
            ['nip' => '1234567890', 'nama' => 'Dr. Ahmad', 'email' => 'ahmad@gmail.com', 'no_telp' => '08123456789'],
            ['nip' => '1234567891', 'nama' => 'Dr. Siti', 'email' => 'siti@gmail.com', 'no_telp' => '08123456790'],
            ['nip' => '1234567892', 'nama' => 'Prof. Budi', 'email' => 'budi@gmail.com', 'no_telp' => '08123456791'],
            ['nip' => '1234567893', 'nama' => 'Dr. Fatima', 'email' => 'fatima@gmail.com', 'no_telp' => '08123456792'],
            ['nip' => '1234567894', 'nama' => 'Dr. Joko', 'email' => 'joko@gmail.com', 'no_telp' => '08123456793'],
            ['nip' => '1234567895', 'nama' => 'Dr. Lisa', 'email' => 'lisa@gmail.com', 'no_telp' => '08123456794'],
            ['nip' => '1234567896', 'nama' => 'Prof. Rudi', 'email' => 'rudi@gmail.com', 'no_telp' => '08123456795'],
            ['nip' => '1234567897', 'nama' => 'Dr. Sari', 'email' => 'sari@gmail.com', 'no_telp' => '08123456796'],
            ['nip' => '1234567898', 'nama' => 'Dr. Arief', 'email' => 'arief@gmail.com', 'no_telp' => '08123456797'],
            ['nip' => '1234567899', 'nama' => 'Prof. Nina', 'email' => 'nina@gmail.com', 'no_telp' => '08123456798'],
        ];
    }
}
