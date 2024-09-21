<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ruang::all();
        return view('baBuatRuang', compact('data'));
    }

    public function index2()
    {

        //check if there is a last prodi that was edited return ruang data with the last prodi
        if(session('lastprodi')){
            $data = Ruang::where('prodi', session('lastprodi'))->get();
            $prodi = session('lastprodi');
            return view('baPlotRuang', compact('data', 'prodi'));
        }else{
            $data = [];
            $prodi = '';
            return view('baPlotRuang', compact('data', 'prodi'));
        }
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
            'noruang' => 'required|unique:noruang',
            'blokgedung' => 'required',
            'lantai' => 'required',
            'fungsi' => 'required',
            'kapasitas' => 'required',
        ]);

        $data = [
            'noruang' => $request->noruang,
            'blokgedung' => $request->blokgedung,
            'lantai' => $request->lantai,
            'fungsi' => $request->fungsi,
            'kapasitas' => $request->kapasitas,
            'status' => 'Pending',
            'prodi' => 'free'
        ];

        Ruang::create($data);
        return redirect()->route('ruang.index');
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request -> validate([
            'noruang' => 'required',
            'blokgedung' => 'required',
            'lantai' => 'required',
            'fungsi' => 'required',
            'kapasitas' => 'required',
        ]);

        $data = [
            'noruang' => $request->noruang,
            'blokgedung' => $request->blokgedung,
            'lantai' => $request->lantai,
            'fungsi' => $request->fungsi,
            'kapasitas' => $request->kapasitas,
            'status' => 'Pending',
        ];

        Ruang::find($id)->update($data);
        return redirect()->route('ruang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Ruang::find($id)->delete();
        return redirect()->route('ruang.index');
    }

    public function plotProdi(Request $request)
    {
        $prodi = $request->input('prodi');

        // Fetch data based on the selected program
        $data = Ruang::where('prodi', $prodi)->get();

        return response()->json(['data' => $data]);
    }

    public function editProdi(string $id){


        //select data from database where id = $id and update the prodi to 'free'
        $data = Ruang::find($id);
        Ruang::find($id)->update(['prodi' => 'free']);

        return redirect()->route('plotruang')->with('lastprodi', $data->prodi);
        


    }
}
