<?php

namespace App\Http\Controllers\Api;

use App\Models\Ruang;
use App\Models\Jadwal;
use App\Models\Irstest;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Irs;

class BuatIrsController extends Controller
{
    //

    public function index()
    {
        
        $user = auth()->user();
        $email = $user->email;
        $mhs = Mahasiswa::where('email', $email)->first();
        $data = Jadwal::select('kodemk')->where('prodi', $user->prodi)->groupBy('kodemk')->get();
        //from kodemk get the name of the matakuliah
        
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
        
        foreach($data as $d){
            $d->matakuliah = Matakuliah::where('kodemk', $d->kodemk)->first()->nama;
            $d->sks = Matakuliah::where('kodemk', $d->kodemk)->first()->sks;
            $d->kelas = Jadwal::where('kodemk', $d->kodemk)->get();
            $d->semester = Matakuliah::where('kodemk', $d->kodemk)->first()->plotsemester;
            foreach($d->kelas as $k){
                $k->isselected = Irstest::where('email', $email)->where('kodejadwal', $k->id)->where('kodemk', $d->kodemk)->first() ? true : false;
                $k->hari = $day[$k->hari];
                $k->jam = $jamstart[$k->jammulai] . ' - ' . $jamend[$k->jamselesai]; 
            }

        }

        //count the total sks where email = data[email]
        $picked = Irstest::where('email', $email)->get();
        $total = 0;
        foreach($picked as $p){
            $total += Matakuliah::where('kodemk', $p->kodemk)->first()->sks;
        }


        $selectedClass = Irstest::where('email', $email)->select('kodemk')->get();

        // Transform the collection into the desired associative array format
        $selectedClassFormatted = [];
        foreach ($selectedClass as $key => $item) {
            //change this Irstest::where('email', $email)->where('kodemk', $item->kodemk)->first()->kodejadwal to integer value
            $selectedClassFormatted[$item->kodemk] = intval(Irstest::where('email', $email)->where('kodemk', $item->kodemk)->first()->kodejadwal);
        }


        // dd($data);
        //and prodi = Informatika
        $dataruang = Ruang::where('status', 'Disetujui')->where('prodi', 'Informatika')->get();

        return response()->json([
            'data' => $data,
            'selectedClass' => $selectedClassFormatted,
        ]);
    }
}
