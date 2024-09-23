<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    public function index()
    {
        $data = Matakuliah::all();
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

        $data = [
            'kodemk' => $request->kodemk,
            'nama' => $request->nama,
            'plotsemester' => $request->plotsemester,
            'sks' => $request->sks,
            'sifat' => $request->sifat,
            'jumlah_kelas' => $request->jumlah_kelas,
        ];

        Matakuliah::create($data);
        return redirect()->route('matakuliah.index');
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
        Matakuliah::find($id)->delete();
        return redirect()->route('matakuliah.index');
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

        $data = [
            'kodemk' => $request->kodemk,
            'nama' => $request->nama,
            'plotsemester' => $request->plotsemester,
            'sks' => $request->sks,
            'sifat' => $request->sifat,
            'jumlah_kelas' => $request->jumlah_kelas,
        ];

        Matakuliah::find($id)->update($data);
        return redirect()->route('matakuliah.index');
    }
}
