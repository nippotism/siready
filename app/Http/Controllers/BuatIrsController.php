<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Models\Irstest;

class BuatIrsController extends Controller
{
    public function index()
    {
        $data = Jadwal::select('kodemk')->groupBy('kodemk')->get();

        $user = auth()->user();
        $email = $user->email;
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
            $d->kelas = Jadwal::where('kodemk', $d->kodemk)->get();
            foreach($d->kelas as $k){
                $k->isselected = Irstest::where('email', $email)->where('kodejadwal', $k->id)->where('kodemk', $d->kodemk)->first() ? true : false;
                $k->hari = $day[$k->hari];
                $k->jam = $jamstart[$k->jammulai] . ' - ' . $jamend[$k->jamselesai]; 
            }

        }
        // dd($data);
        //and prodi = Informatika
        $dataruang = Ruang::where('status', 'Disetujui')->where('prodi', 'Informatika')->get();
        return view('mhsBuatIrs', compact('data','email'));
    }

    public function createIrs(Request $request) {
        $request -> validate([
            'email' => 'required',
            'kodejadwal' => 'required',
            'kodemk' => 'required'
        ]);

        

        $data = [
            'email' => $request->email,
            'kodejadwal' => $request->kodejadwal,
            'kodemk' => $request->kodemk
        ];

        
        //check if the email and kodemk already exist in the database
        $check = Irstest::where('email', $data['email'])->where('kodemk', $data['kodemk'])->first();
        // $check = Irstest::all();
        if($check) {
            $check->update($data);
        }else{

            Irstest::create($data);
        }
        return response()->json(['data' => $data]);   
        

    }

    public function deleteIrs(Request $request) {

        $request->validate(['id' => 'required']);

        $id = $request->id;
<<<<<<< HEAD

        $data = Irstest::find($id);
        $data->delete();
        
        
        return response()->json(['data' => $data]);
=======
        $data = Irstest::find($id);

        $kodejadwal = $data->kodejadwal;
        $data->delete();
        
        
        return response()->json(['kodejadwal' => $kodejadwal]);
>>>>>>> ad170b41c6650533d51cd4a2dea20d9bd6be771d
    }

    public function viewIrs(Request $request) {
        $request->validate(['email' => 'required']);
        
        $data = Irstest::where('email', $request->email)->get();
    
        foreach ($data as $d) {
            $matkul = Matakuliah::where('kodemk', $d->kodemk)->first();
            $d->nama = $matkul ? $matkul->nama : 'N/A';
            $d->sks = $matkul ? $matkul->sks : 0;
            $d->kelas = Jadwal::where('id', $d->kodejadwal)->first();
        }
    
        return response()->json($data);
    }
    
}
