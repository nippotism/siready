<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Irs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IrsController extends Controller
{
    public function all()
    {
        $email = auth()->user()->email;
    
        // Fetch semester-specific data with the correct grouping
        $data = Irs::select(
                'irs.semester as irs_semester',
                DB::raw('SUM(mata_kuliah.sks) as total_sks')
            )
            ->join('mata_kuliah', 'irs.kode', '=', 'mata_kuliah.kodemk')
            ->join('mahasiswa', 'irs.email', '=', 'mahasiswa.email')
            ->where('irs.email', $email)
            ->where('irs.status', 'Disetujui')
            ->groupBy('irs.semester') // Group by semester from irs_test
            ->get();
            // dd($data);
    
        return view('mhsIrs', compact('data', 'email'));
    }
    

    public function index(Request $request, $semester,$email)
    {
        // Get the specific records for the selected semester from matakuliah

        $query ="SELECT m.kodemk as kodemk, 
                        m.nama as mata_kuliah, 
                        -- j.ruang as ruang, 
                        i.kelas as kelas,
                        i.hari_jam as hari,
                        i.ruang as ruang,
                        i.sks as sks 
                FROM irs i 
                JOIN mata_kuliah m ON i.kode = m.kodemk 
                -- JOIN jadwal j ON i.kodejadwal = j.id  
                JOIN mahasiswa ma ON ma.email = i.email 
                WHERE ma.email = '".$email."'
                AND i.status = 'Disetujui'  
                AND i.semester=".$semester."";

        // return response()->json(['data' => $query]);

        $data = DB::select($query);

        foreach ($data as $key => $value) {
            $value->dosen = DB::select('SELECT d.nama FROM dosen d JOIN dosen_matakuliah dm ON d.nip = dm.nip WHERE dm.kodemk = "'.$value->kodemk.'"');
        }

        //change data to object
        $data = json_decode(json_encode($data));
        return response()->json(['data' => $data]);



        if ($request->ajax()) {
            return response()->json($data);
        }
    }
}
