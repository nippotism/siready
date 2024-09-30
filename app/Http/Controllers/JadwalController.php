<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = auth()->user();
        $data = Jadwal::where('prodi', $user->prodi)->get(); 

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
        $data->belumcount = $data->where('status', 'Belum Dibuat')->count();
        $dataruang = Ruang::where('status', 'Disetujui')->where('prodi', $user->prodi)->get();
        return view('kpBuatJadwal', compact('data', 'dataruang', 'jamend'));
    }

    public function index2()
    {
         // Get the authenticated user
        $user = auth()->user();
        $data = Jadwal::where('status', 'Disetujui')
                ->where('prodi', $user->prodi)
                ->get();

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
            $d->belumDibuatCount = $data->where('status', 'Belum Dibuat')->count();
        }
        //and prodi = Informatika
        return view('kpReviewJadwal', compact('data'));
    }

    public function index3()
    {

        $data = Jadwal::select('prodi', DB::raw('COUNT(*) as jadwal_count'))
        ->groupBy('prodi')
        ->get();
            
        // Add a flag to check if all jadwal for the program studi are 'Pending'
        foreach ($data as $jadwal) {
        $jadwal->all_pending = Jadwal::where('prodi', $jadwal->prodi)
            ->where('status', '=', 'Belum Dibuat')
            ->exists() ? false : true; 
        $jadwal->belumcount = Jadwal::where('prodi', $jadwal->prodi)->where('status', 'Belum Dibuat')->count();
        }

        
        return view('dkAjuanJadwal', compact('data'));
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
        ]);

        $user = auth()->user();
        $data = [
            'hari' => $request->hari,
            'jammulai' => $request->jammulai,
            'jamselesai' => (int)$request->jammulai + (int)Matakuliah::where('kodemk', Jadwal::find($id)->kodemk)->first()->sks,
            'ruang' => $request->ruang,
            'kodemk' => Jadwal::find($id)->kodemk,
            'kelas' => Jadwal::find($id)->kelas,
            'kapasitas' => Ruang::where('noruang', $request->ruang)->first()->kapasitas,
            'status' => 'Pending'
        ];


        Jadwal::find($id)->update($data);
        return redirect()->route('buatjadwal');
    }

    public function approve(Request $request)
    {
        $request->validate([
            'prodi' => 'required'
        ]);

        // Update all 'pending' Jadwal entries for the selected prodi to 'Disetujui'
        Jadwal::where('prodi', $request->prodi)
            ->where('status', 'Pending')
            ->update(['status' => 'Disetujui']);

        return response()->json(['message' => 'Jadwal has been approved for ' . $request->prodi]);
    }

    public function reject(Request $request)
    {
        $request->validate([
            'prodi' => 'required'
        ]);

        // Update all 'pending' Jadwal entries for the selected prodi to 'Ditolak'
        Jadwal::where('prodi', $request->prodi)
            ->where('status', 'Pending')
            ->update(['status' => 'Ditolak']);

        return response()->json(['message' => 'Jadwal has been rejected for ' . $request->prodi]);
    }

    public function reviewJadwalProdi($prodi)
    {


       $data = Jadwal::where('prodi', $prodi)->get();

       $data->prodi = $prodi;
       
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
       return view('kpReviewJadwal', compact('data'));
   }

}
