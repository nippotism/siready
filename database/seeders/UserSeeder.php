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
            ['name' => 'Mulyono', 'email' => 'mulyono@gmail.com', 'password' => '12345678', 'role' => 'Mahasiswa'],
            ['name' => 'Muhaimin Iskandar', 'email' => 'muhaimin@gmail.com', 'password' => '12345678', 'role' => 'Pembimbing Akademik'],
            ['name' => 'Mahfud MD', 'email' => 'mahfud@gmail.com', 'password' => '12345678', 'role' => 'Kaprodi'],
            ['name' => 'Airlangga Hartarto', 'email' => 'airlangga@gmail.com', 'password' => '12345678', 'role' => 'Dekan'],
        ];

        foreach ($user as $p) {
            $p['password'] = Hash::make($p['password']); // Hash the password
            User::create($p);
        }
    }
}