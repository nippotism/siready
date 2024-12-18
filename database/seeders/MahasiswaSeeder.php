<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'nim' => '2022010001',
                'nama' => 'Ahmad Pratama',
                'email' => 'ahmad@gmail.com',
                'no_telp' => '081234567890',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2002-05-15',
                'prodi' => 'Informatika',
                'jalur_masuk' => 'SNBP',
                'angkatan' => 2021,
                'ips' => 3.5,
                'ipk' => 3.5,
                'semester_berjalan' => 7,
                'nip_doswal' => '1234567890',
                'alamat' => 'Jl. Merdeka No. 1, Jakarta',
                'status' => 'Aktif',
            ],
            [
                'nim' => '2022010003',
                'nama' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'no_telp' => '081234567892',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2004-03-12',
                'prodi' => 'Matematika',
                'jalur_masuk' => 'MANDIRI',
                'angkatan' => 2022,
                'ips' => 2.4,
                'ipk' => 3.2,
                'semester_berjalan' => 5,
                'nip_doswal' => '1234567890',
                'alamat' => 'Jl. Mangga No. 5, Surabaya',
                'status' => 'Aktif',
            ],
            [
                'nim' => '2022010004',
                'nama' => 'Rina Kurnia',
                'email' => 'rina@gmail.com',
                'no_telp' => '081234567893',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2003-11-04',
                'prodi' => 'Informatika',
                'jalur_masuk' => 'SNBT',
                'angkatan' => 2023,
                'ips' => 3.1,
                'ipk' => 3.6,
                'semester_berjalan' => 3,
                'nip_doswal' => '1234567890',
                'alamat' => 'Jl. Mawar No. 20, Semarang',
                'status' => 'Aktif',
            ],
            [
                'nim' => '2022010005',
                'nama' => 'Andi Saputra',
                'email' => 'andi@gmail.com',
                'no_telp' => '081234567894',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2002-07-19',
                'prodi' => 'Fisika',
                'jalur_masuk' => 'MANDIRI',
                'angkatan' => 2022,
                'ips' => 2.4,
                'ipk' => 3.4,
                'semester_berjalan' => 5,
                'nip_doswal' => '1234567890',
                'alamat' => 'Jl. Anggrek No. 3, Yogyakarta',
                'status' => 'Aktif',
            ],
            [
                'nim' => '2022010006',
                'nama' => 'Fitri Handayani',
                'email' => 'fitri@gmail.com',
                'no_telp' => '081234567895',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2002-01-25',
                'prodi' => 'Matematika',
                'jalur_masuk' => 'SNBP',
                'angkatan' => 2022,
                'ips' => 2.9,
                'ipk' => 3.7,
                'semester_berjalan' => 5,
                'nip_doswal' => '1234567890',
                'alamat' => 'Jl. Melati No. 7, Malang',
                'status' => 'Aktif',
            ],
            [
                'nim' => '2022010007',
                'nama' => 'Hendra Wijaya',
                'email' => 'hendra@gmail.com',
                'no_telp' => '081234567896',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2004-09-09',
                'prodi' => 'Informatika',
                'jalur_masuk' => 'SNBT',
                'angkatan' => 2020,
                'ips' => 3.7,
                'ipk' => 3.8,
                'semester_berjalan' => 9,
                'nip_doswal' => '1234567891',
                'alamat' => 'Jl. Durian No. 6, Palembang',
                'status' => 'Aktif',
            ],
            [
                'nim' => '2022010008',
                'nama' => 'Lina Susanti',
                'email' => 'lina@gmail.com',
                'no_telp' => '081234567897',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2003-02-14',
                'prodi' => 'Fisika',
                'jalur_masuk' => 'MANDIRI',
                'angkatan' => 2022,
                'ips' => 2.8,
                'ipk' => 3.3,
                'semester_berjalan' => 5,
                'nip_doswal' => '1234567891',
                'alamat' => 'Jl. Jeruk No. 9, Medan',
                'status' => 'Aktif',
            ],
            [
                'nim' => '2022010009',
                'nama' => 'Rudi Setiawan',
                'email' => 'rudi@gmail.com',
                'no_telp' => '081234567898',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2003-10-10',
                'prodi' => 'Matematika',
                'jalur_masuk' => 'SNBP',
                'angkatan' => 2022,
                'ips' => 3.8,
                'ipk' => 3.9,
                'semester_berjalan' => 5,
                'nip_doswal' => '1234567891',
                'alamat' => 'Jl. Apel No. 2, Balikpapan',
                'status' => 'Aktif',
            ],
            [
                'nim' => '2022010099',
                'nama' => 'Yoga Saputra',
                'email' => 'yoga@gmail.com',
                'no_telp' => '08156332334',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2004-05-10',
                'prodi' => 'Informatika',
                'jalur_masuk' => 'SNBP',
                'angkatan' => 2022,
                'ips' => 2.4,
                'ipk' => 3.1,
                'semester_berjalan' => 5,
                'nip_doswal' => '1234567891',
                'alamat' => 'Jl. Apel No. 2, Balikpapan',
                'status' => 'Aktif',
            ],
            [
                'nim' => '2022010010',
                'nama' => 'Sari Dewi',
                'email' => 'sari@gmail.com',
                'no_telp' => '081234567899',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2004-06-18',
                'prodi' => 'Informatika',
                'jalur_masuk' => 'SNBP',
                'angkatan' => 2022,
                'ips' => 3.6,
                'ipk' => 3.8,
                'semester_berjalan' => 5,
                'nip_doswal' => '1234567890',
                'alamat' => 'Jl. Semangka No. 11, Makassar',
                'status' => 'Aktif',
            ],
        ]);
    }
}
