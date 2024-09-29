<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = Matakuliah::where('program_studi', $user->prodi)->get(); 
        return view('kpBuatMk', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request -> validate([
            'kodemk' => 'required',
            'nama' => 'required',
            'plotsemester' => 'required',
            'sks' => 'required',
            'sifat' => 'required',
            'jumlah_kelas' => 'required',
        ]);
        $user = auth()->user();
        $data = [
            'kodemk' => $request->kodemk,
            'nama' => $request->nama,
            'plotsemester' => $request->plotsemester,
            'program_studi' => $user->prodi,
            'sks' => $request->sks,
            'sifat' => $request->sifat,
            'jumlah_kelas' => $request->jumlah_kelas,
        ];

        for($i=0; $i<$request->jumlah_kelas; $i++){
            $datajadwal = [
                'hari' => null,
                'jam'=> null,
                'ruang' => null,
                'kodemk' => $request->kodemk,
                'kelas' => chr(65+$i),
                'kapasitas'=> null,
                'prodi' => $user->prodi,
                'status' => 'Belum Dibuat'
            ];

            Jadwal::create($datajadwal);
        }

        Matakuliah::create($data);
        return redirect()->route('matakuliah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kodemk = Matakuliah::find($id)->kodemk;
        Jadwal::where('kodemk', $kodemk)->delete();
        Matakuliah::destroy($id);
        return redirect()->route('matakuliah');
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request -> validate([
            'kodemk' => 'required',
            'nama' => 'required',
            'plotsemester' => 'required',
            'sks' => 'required',
            'sifat' => 'required',
            'jumlah_kelas' => 'required',
        ]);
        $user = auth()->user();
        $data = [
            'kodemk' => $request->kodemk,
            'nama' => $request->nama,
            'plotsemester' => $request->plotsemester,
            'sks' => $request->sks,
            'sifat' => $request->sifat,
            'jumlah_kelas' => $request->jumlah_kelas,
        ];

        if($request->jumlah_kelas > Matakuliah::find($id)->jumlah_kelas){
            for($i=Matakuliah::find($id)->jumlah_kelas; $i<$request->jumlah_kelas; $i++){
                $datajadwal = [
                    'hari' => null,
                    'jam'=> null,
                    'ruang' => null,
                    'kodemk' => $request->kodemk,
                    'kelas' => chr(65+$i),
                    'kapasitas'=> null,
                    'prodi' => $user->prodi,
                    'status' => 'Belum Dibuat'
                ];
    
                Jadwal::create($datajadwal);
            }
        }else{
            for($i=Matakuliah::find($id)->jumlah_kelas-1; $i>=$request->jumlah_kelas; $i--){
                Jadwal::where('kodemk', $request->kodemk)->where('kelas', chr(65+$i))->delete();
            }
        }

        Matakuliah::find($id)->update($data);
        return redirect()->route('matakuliah');
    }
}
