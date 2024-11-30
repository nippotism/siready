<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['name' => 'Mulyono', 'email' => 'mulyono@gmail.com', 'password' => '12345678', 'role' => 'Mahasiswa', 'prodi'=> 'Informatika', 'mhs'=>1, 'status' => 'Non Aktif'],
            ['name' => 'Yoga Saputra', 'email' => 'yoga@gmail.com', 'password' => '12345678', 'role' => 'Mahasiswa', 'prodi'=> 'Informatika', 'mhs'=>1, 'status' => 'Aktif'],
            ['name' => 'Ahmad Pratama', 'email' => 'ahmad@gmail.com', 'password' => '12345678', 'role' => 'Mahasiswa', 'prodi'=> 'Informatika', 'mhs'=>1, 'status' => 'Aktif'],
            ['name' => 'Rina Kurnia', 'email' => 'rina@gmail.com', 'password' => '12345678', 'role' => 'Mahasiswa', 'prodi'=> 'Informatika', 'mhs'=>1, 'status' => 'Aktif'],
            ['name' => 'Hendra Wijaya', 'email' => 'hendra@gmail.com', 'password' => '12345678', 'role' => 'Mahasiswa', 'prodi'=> 'Informatika', 'mhs'=>1, 'status' => 'Aktif'],
            ['name' => 'Budiono', 'email' => 'budiono@gmail.com', 'password' => '12345678', 'role' => 'Pembimbing Akademik', 'prodi' => 'Informatika', 'pa'=>1],
            ['name' => 'Anies Baswedan', 'email' => 'anies@gmail.com', 'password' => '12345678', 'role' => 'Pembimbing Akademik', 'prodi' => 'Informatika', 'pa'=>1],
            ['name' => 'Sidik Sasongko', 'email' => 'sidik@gmail.com', 'password' => '12345678', 'role' => 'Kaprodi', 'prodi' => 'Informatika', 'kp'=>1, 'dk'=>1],
            ['name' => 'Gibran Rakabuming', 'email' => 'gibran@gmail.com', 'password' => '12345678', 'role' => 'Kaprodi', 'prodi' => 'Fisika', 'kp'=>1],
            ['name' => 'Aris Widodo', 'email' => 'aris@gmail.com', 'password' => '12345678', 'role' => 'Dekan', 'prodi' => 'Informatika', 'dk'=>1],
            ['name' => 'Bahlil Lahadalia', 'email' => 'bahlil@gmail.com', 'password' => '12345678', 'role' => 'BA', 'prodi' => 'Informatika', 'ba'=>1],
        ];

        foreach ($user as $p) {
            $p['password'] = Hash::make($p['password']); // Hash the password
            User::create($p);
        }
    }
}
