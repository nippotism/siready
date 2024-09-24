<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JadwalController extends Controller
{
    //

    public function index()
    {
        $data = Jadwal::all();

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
            $d->jammulai = $jamstart[$d->jammulai];
            $d->jamselesai = $jamend[$d->jamselesai];
            $d->hari = $day[$d->hari];
        }
        //and prodi = Informatika
        $dataruang = Ruang::where('status', 'Disetujui')->where('prodi', 'Informatika')->get();
        return view('kpBuatJadwal', compact('data', 'dataruang', 'jamend'));
    }

    public function isJadwalExist(Request $request)
    {

        // return response()->json(request()->all());
        
        if(request()->ajax()){
            $hari = request()->hari;
            $jammulai = request()->jammulai;
            $jamselesai = request()->jamselesai;
            $ruang = request()->ruang;
        }

        
        $data = Jadwal::where('hari', $hari)
                ->where('ruang', $ruang)
                ->where(function($query) use ($jammulai, $jamselesai) {
                    $query->where(function($subQuery) use ($jammulai, $jamselesai) {
                        $subQuery->where('jammulai', '>=', $jammulai)
                                 ->where('jammulai', '<=', $jamselesai);
                    })
                    ->orWhere(function($subQuery) use ($jammulai, $jamselesai) {
                        $subQuery->where('jamselesai', '>', $jammulai)
                                 ->where('jamselesai', '<=', $jamselesai);
                    });
                })->get();

        foreach($data as $d){
            $d->matakuliah = Matakuliah::where('kodemk', $d->kodemk)->first()->nama;
            $d->sks = Matakuliah::where('kodemk', $d->kodemk)->first()->sks;
        }


                

        if($data->count() > 0){
            return response()->json(['bool'=>true, 'data'=>$data]);
        }else{
            return response()->json(['bool'=>false]);
        }
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $request -> validate([
            'hari' => 'required',
            'jammulai' => 'required',
            'ruang' => 'required',
            'kapasitas' => 'required',
        ]);

        $data = [
            'hari' => $request->hari,
            'jammulai' => $request->jammulai,
            'jamselesai' => (int)$request->jammulai + (int)Matakuliah::where('kodemk', Jadwal::find($id)->kodemk)->first()->sks,
            'ruang' => $request->ruang,
            'kodemk' => Jadwal::find($id)->kodemk,
            'kelas' => Jadwal::find($id)->kelas,
            'kapasitas' => $request->kapasitas,
            'status' => 'Pending'
        ];


        Jadwal::find($id)->update($data);
        return redirect()->route('buatjadwal');
    }
}
