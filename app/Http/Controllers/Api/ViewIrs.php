<?php

namespace App\Http\Controllers\Api;

use App\Models\Irstest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ViewIrs extends Controller
{

    public function dataIrs()
    {

        $jamend = [
            "" => '',
            1 => '07.50',
            2 => '08.40',
            3 => '09.30',
            4 => '10.30',
            5 => '11.20',
            6 => '12.10',
            7 => '13.00',
            8 => '13.50',
            9 => '14.40',
            10 => '15.40',
            11 => '16.30',
            12 => '17.20',
            13 => '18.10',
        ];

        $jamstart = [
            "" => '',
            0 => '07.00',
            1 => '07.50',
            2 => '08.40',
            3 => '09.40',
            4 => '10.30',
            5 => '11.20',
            6 => '12.10',
            7 => '13.00',
            8 => '13.50',
            9 => '14.40',
            10 => '15.40',
            11 => '16.30',
        ];

        $day = [
            "" => '',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
        ];


        $user = auth()->user();

        $email  = $user->email;

        $data = Irstest::select('semester', DB::raw('sum(sks) as total_sks'))
            ->join('mata_kuliah', 'irs_test.kodemk', '=', 'mata_kuliah.kodemk')
            ->join('mahasiswa', 'irs_test.email', '=', 'mahasiswa.email')
            ->where('irs_test.email', $email)
            ->where('irs_test.status', 'Disetujui')
            ->groupBy('semester')
            ->get();

        foreach($data as $semester){


            $smt = $semester->semester;

            $query ="SELECT m.kodemk as kode, 
                        m.nama as name, 
                        j.ruang as ruang, 
                        m.sks as sks,
                        j.kelas as class,
                        j.hari as hari,
                        j.jammulai as jammulai,
                        j.jamselesai as jamselesai,
                        m.plotsemester as semester
                FROM irs_test i 
                JOIN mata_kuliah m ON i.kodemk = m.kodemk 
                JOIN jadwal j ON i.kodejadwal = j.id  
                JOIN mahasiswa ma ON ma.email = i.email 
                WHERE ma.email = '".$email."'
                AND i.status = 'Disetujui'  
                AND i.semester=".$smt."";
            
            $semester->courses = DB::select($query);

            foreach($semester->courses as $course){
                $course->time = $day[$course->hari].' '.$jamstart[$course->jammulai].' - '.$jamend[$course->jamselesai];
            }
        }
        
        return response()->json(['data' => $data]);

    


    }
}
