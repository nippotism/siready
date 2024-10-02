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
        DB::table('khs')->insert(
            [
                'nim' => '2022010007',
                'kode' => 'PAIK6996',
                'nilai' => 'D',
            ],
            [
                'nim' => '2022010001',
                'kode' => 'PAIK6996',
                'nilai' => 'C',
            ],
            
    );
    }
}
