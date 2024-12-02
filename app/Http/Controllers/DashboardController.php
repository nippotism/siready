<?php

namespace App\Http\Controllers;

use App\Models\Irstest;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Access user name
        $userName = $user->name;
        $status = $user->status;
        $mhs = Mahasiswa::where('email', $user->email)->first();
        $semester_berjalan = Mahasiswa::where('email', $user->email)->first()->semester_berjalan;
        $total_sks = DB::table('irs')
                        ->join('mata_kuliah', 'irs.kode', '=', 'mata_kuliah.kodemk')
                        ->select('mata_kuliah.sks')
                        ->where('email', $user->email)
                        ->where('status', 'Disetujui')
                        ->sum('irs.sks');

        $doswal = Dosen::where('nip', $mhs->nip_doswal)->first();

        $data = [
            'userName' => $userName,
            'status' => $status,
            'ipk' => $mhs->ipk,
            'total_sks' => $total_sks,
            'nama_doswal' => $doswal->nama,
            'nip_doswal' => $doswal->nip,
            'ips' => $mhs->ips,
        ];

        $todayNumber = date('N');
 

        $jadwalhariini = DB::table('jadwal')
                        ->join('mata_kuliah', 'jadwal.kodemk', '=', 'mata_kuliah.kodemk')
                        ->join('irs_test','jadwal.id','=','irs_test.kodejadwal')
                        ->select('jadwal.kodemk', 'mata_kuliah.nama', 'jadwal.kelas', 'jadwal.hari', 'jadwal.jammulai','jadwal.jamselesai','jadwal.ruang')  
                        ->where('jadwal.hari', $todayNumber)
                        ->where('irs_test.email', $user->email)
                        ->where('irs_test.status', 'Disetujui')
                        ->orderBy('jadwal.jammulai')
                        ->get();

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

        foreach ($jadwalhariini as $d) {
            $d->jammulai = $jamstart[$d->jammulai];
            $d->jamselesai = $jamend[$d->jamselesai];
        }

        // dd($jadwalhariini);
                        
        
                         


        // dd($data);

        // Pass the user data to a view, or return a response
        return view('MhsDashboard',compact('data', 'semester_berjalan', 'jadwalhariini'));   



    }
    public function index2()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Access user name
        $userName = $user->name;
        $status = $user->status;

        $data = [
            'userName' => $userName,
            'status' => $status
        ];

        // Pass the user data to a view, or return a response
        return view('paDashboard',compact('data'));
    }
    public function index3()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Access user name
        $userName = $user->name;
        $status = $user->status;

        $data = [
            'userName' => $userName,
            'status' => $status
        ];

        // Pass the user data to a view, or return a response
        return view('MhsDashboard',compact('data'));
    }
    public function index4()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Access user name
        $userName = $user->name;
        $status = $user->status;

        $data = [
            'userName' => $userName,
            'status' => $status
        ];

        // Pass the user data to a view, or return a response
        return view('MhsDashboard',compact('data'));
    }


    public function registMhs(){

        $user = auth()->user();
        $email = $user->email;

        $mhs = Mahasiswa::where('email', $email)->first();

        // dd($mhs);


        return view('mhsRegistrasi', compact('mhs'));
    }
}
