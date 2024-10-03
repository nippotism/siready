<?php

namespace App\Http\Controllers;


use App\Models\Irstest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IrsController extends Controller
{
    public function all()
    {
        // Join the mahasiswa table to group by semester in matakuliah and sum SKS
        $data = Irstest::select('mata_kuliah.plotsemester as semester', DB::raw('SUM(mata_kuliah.sks) as total_sks'))
            ->join('mata_kuliah', 'irs_test.kodemk', '=', 'mata_kuliah.kodemk')
            ->where('irs_test.status', 'Disetujui')  // Filter by status 'Disetujui'
            ->groupBy('mata_kuliah.plotsemester')
            ->orderBy('mata_kuliah.plotsemester', 'asc')
            ->get();

        // dd($data);

        $email = auth()->user()->email;

        return view('mhsIrs', compact('data', 'email'));
    }

    public function index(Request $request, $semester,$email)
    {

        // Get the specific records for the selected semester from matakuliah
        $query = "SELECT m.kodemk as kodemk, m.nama as mata_kuliah, j.ruang as ruang, m.sks as sks FROM irs_test i JOIN mata_kuliah m ON i.kodemk = m.kodemk JOIN jadwal j ON i.kodejadwal = j.id WHERE email = '".$email."' AND i.status = 'Disetujui'  AND plotsemester='".$semester."'";

        $data = DB::select($query);

        //change data to object
        $data = json_decode(json_encode($data));
        return response()->json(['data' => $data]);



        if ($request->ajax()) {
            return response()->json($data);
        }
    }
}
