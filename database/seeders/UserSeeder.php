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
            ['name' => 'Mulyono', 'email' => 'mulyono@gmail.com', 'password' => '12345678', 'role' => 'Mahasiswa', 'mhs'=>1, 'status' => 'Non Aktif'],
            ['name' => 'Bobby Nasution', 'email' => 'bobby@gmail.com', 'password' => '12345678', 'role' => 'Mahasiswa', 'mhs'=>1, 'status' => 'Aktif'],
            ['name' => 'Muhaimin Iskandar', 'email' => 'muhaimin@gmail.com', 'password' => '12345678', 'role' => 'Pembimbing Akademik', 'pa'=>1],
            ['name' => 'Mahfud MD', 'email' => 'mahfud@gmail.com', 'password' => '12345678', 'role' => 'Kaprodi', 'kp'=>1, 'dk'=>1],
            ['name' => 'Airlangga Hartarto', 'email' => 'airlangga@gmail.com', 'password' => '12345678', 'role' => 'Dekan', 'dk'=>1],
            ['name' => 'Bahlil Lahadalia', 'email' => 'bahlil@gmail.com', 'password' => '12345678', 'role' => 'BA', 'ba'=>1],
        ];

        foreach ($user as $p) {
            $p['password'] = Hash::make($p['password']); // Hash the password
            User::create($p);
        }
    }
}
