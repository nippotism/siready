<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Irstest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IrsController extends Controller
{
    public function all()
    {
        $email = auth()->user()->email;
        // Join the mahasiswa table to group by semester in matakuliah and sum SKS
        $data = Irstest::select('semester', DB::raw('sum(sks) as total_sks'))
            ->join('mata_kuliah', 'irs_test.kodemk', '=', 'mata_kuliah.kodemk')
            ->join('mahasiswa', 'irs_test.email', '=', 'mahasiswa.email')
            ->where('irs_test.email', $email)
            ->where('irs_test.status', 'Disetujui')
            ->groupBy('semester')
            ->get();

        // dd($data);


        return view('mhsIrs', compact('data', 'email'));
    }

    public function index(Request $request, $semester,$email)
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

        // Get the specific records for the selected semester from matakuliah

        $query ="SELECT m.kodemk as kodemk, 
                        m.nama as mata_kuliah, 
                        j.ruang as ruang, 
                        m.sks as sks,
                        j.hari as hari,
                        j.jammulai as jammulai,
                        j.jamselesai as jamselesai
                FROM irs_test i 
                JOIN mata_kuliah m ON i.kodemk = m.kodemk 
                JOIN jadwal j ON i.kodejadwal = j.id  
                JOIN mahasiswa ma ON ma.email = i.email 
                WHERE ma.email = '".$email."'
                AND i.status = 'Disetujui'  
                AND i.semester=".$semester."";

        // return response()->json(['data' => $query]);

        $data = DB::select($query);

        foreach ($data as $key => $value) {
            $value->dosen = DB::select('SELECT d.nama FROM dosen d JOIN dosen_matakuliah dm ON d.nip = dm.nip WHERE dm.kodemk = "'.$value->kodemk.'"');
            $value->jammulai = $jamstart[$value->jammulai];
            $value->jamselesai = $jamend[$value->jamselesai];
            $value->hari = $day[$value->hari];
        }

        //change data to object
        $data = json_decode(json_encode($data));
        return response()->json(['data' => $data]);



        if ($request->ajax()) {
            return response()->json($data);
        }
    }
}
