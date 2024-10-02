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
        $data = Irstest::select('mata_kuliah.plotsemester', DB::raw('SUM(mata_kuliah.sks) as total_sks'))
            ->join('mata_kuliah', 'irs_test.kodemk', '=', 'mata_kuliah.kodemk')
            ->where('irs_test.status', 'Disetujui')  // Filter by status 'Disetujui'
            ->groupBy('mata_kuliah.plotsemester')
            ->get();

        return view('mhsIrs', compact('data'));
    }

    public function index(Request $request, $semester)
    {
        // Get the specific records for the selected semester from matakuliah
        $data = Irstest::select('irs_test.kodemk', 'mata_kuliah.nama as mata_kuliah', 'irs_test.ruang', 'mata_kuliah.sks')
            ->join('mata_kuliah', 'irs_test.kodemk', '=', 'mata_kuliah.kodemk')
            ->where('mata_kuliah.plotsemester', $semester)  // Use semester from matakuliah
            ->where('irs_test.status', 'Disetujui')  // Filter by status 'Disetujui'
            ->get();

        if ($request->ajax()) {
            return response()->json($data);
        }
    }
}
