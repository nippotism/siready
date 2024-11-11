<?php

namespace App\Http\Controllers\Api;

use App\Models\Irs;
use App\Models\Khs;
use App\Models\Ruang;
use App\Models\Jadwal;
use App\Models\Irstest;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BuatIrsController extends Controller
{
    //

    public function index()
    {
        
        $user = auth()->user();
        $email = $user->email;
        $mhs = Mahasiswa::where('email', $email)->first();
        $data = Jadwal::select('kodemk')->where('prodi', $user->prodi)->groupBy('kodemk')->get();
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
            $d->semester = Matakuliah::where('kodemk', $d->kodemk)->first()->plotsemester;
            foreach($d->kelas as $k){
                $k->isselected = Irstest::where('email', $email)->where('kodejadwal', $k->id)->where('kodemk', $d->kodemk)->first() ? true : false;
                $k->hari = $day[$k->hari];
                $k->jam = $jamstart[$k->jammulai] . ' - ' . $jamend[$k->jamselesai]; 
            }

        }

        //count the total sks where email = data[email]
        $picked = Irstest::where('email', $email)->get();
        $total = 0;
        foreach($picked as $p){
            $total += Matakuliah::where('kodemk', $p->kodemk)->first()->sks;
        }


        $selectedClass = Irstest::where('email', $email)->select('kodemk')->get();

        // Transform the collection into the desired associative array format
        $selectedClassFormatted = [];
        foreach ($selectedClass as $key => $item) {
            //change this Irstest::where('email', $email)->where('kodemk', $item->kodemk)->first()->kodejadwal to integer value
            $selectedClassFormatted[$item->kodemk] = intval(Irstest::where('email', $email)->where('kodemk', $item->kodemk)->first()->kodejadwal);
        }


        // dd($data);
        //and prodi = Informatika
        $dataruang = Ruang::where('status', 'Disetujui')->where('prodi', 'Informatika')->get();

        return response()->json([
            'data' => $data,
            'selectedClass' => $selectedClassFormatted,
        ]);
    }

    public function createIrs(Request $request) {

        // return response()->json(['data' => $request->all()]);
        $request -> validate([
            'kodejadwal' => 'required',
            'kodemk' => 'required'
        ]);

        $user = auth()->user();
        $email = $user->email;

        //counting prioritas
        $Mahasiswa = Mahasiswa::where('email', $email)->first();
        $smtMahasiswa = $Mahasiswa->semester_berjalan;
        $smtMatakuliah = Matakuliah::where('kodemk', $request->kodemk)->first()->plotsemester;
        //check is empty query if yes fill with S
        $nilaiKhs = Khs::where('nim', $Mahasiswa->nim)->where('kode', $request->kodemk)->first() ? Khs::where('nim', $Mahasiswa->nim)->where('kode', $request->kodemk)->first()->nilai : 'S';
        
        // return response()->json(['data' => $nilaiKhs]);

        if($smtMahasiswa > $smtMatakuliah){
            if($nilaiKhs == 'D' || $nilaiKhs == 'E'){
                $prioritas = 3;
            }else if($nilaiKhs == 'A'|| $nilaiKhs == 'C' || $nilaiKhs == 'B'){
                $prioritas = 2;
            }else{
                $prioritas = 4;
            }
        }else if($smtMahasiswa == $smtMatakuliah){
            $prioritas = 5;
        }else{
            $prioritas = 1;
        }

        //end of counting prioritas

        $data = [
            'email' => $email,
            'kodejadwal' => $request->kodejadwal,
            'kodemk' => $request->kodemk,
            'prioritas' => $prioritas,
            'status' => 'Pending',
            'semester' => $Mahasiswa->semester_berjalan
        ];

        // return response()->json(['data' => $data]);

        
        //check if the email and kodemk already exist in the database
        $check = Irstest::where('email', $data['email'])->where('kodemk', $data['kodemk'])->first();
        if($check) {
            $check->update($data);
        }else{

            Irstest::create($data);
        }

        //sort the irs by created at and prioritas and get the position of the data
        $row_index = Irstest::select(DB::raw('ROW_NUMBER() OVER (ORDER BY prioritas DESC,updated_at ASC) AS row_index,email'))
        ->where('kodejadwal', $data['kodejadwal'])
        ->get();

        $jadwal = Jadwal::where('id', $data['kodejadwal'])->first();

        $position = 0;
        foreach($row_index as $r){
            if($r->email == $data['email']){
                $position = $r->row_index;
            }

            if($r->row_index > $jadwal->kapasitas){
                $delete = Irstest::where('email', $r->email)->where('kodejadwal', $data['kodejadwal'])->first();
                $delete->delete();
            }

        }



        //count the total sks where email = data[email]
        $picked = Irstest::where('email', $data['email'])->get();
        $total = 0;
        foreach($picked as $p){
            $total += Matakuliah::where('kodemk', $p->kodemk)->first()->sks;
        }

        $data['sks'] = $total;
        $data['position'] = $position;
        



        return response()->json(['data' => $data, 'position' => $row_index]);   
        

    }

    public function viewIrs(Request $request) {
        
        $user = auth()->user();
        $email = $user->email;
        
        $data = Irstest::where('email', $email)->get();
    
        foreach ($data as $d) {
            $matkul = Matakuliah::where('kodemk', $d->kodemk)->first();
            $d->nama = $matkul ? $matkul->nama : 'N/A';
            $d->sks = $matkul ? $matkul->sks : 0;
            $d->kelas = Jadwal::where('id', $d->kodejadwal)->first();
            $d->kapasitas = $d->kelas->kapasitas;

            //check position in priorty queue
            $row_index = Irstest::select(DB::raw('ROW_NUMBER() OVER (ORDER BY prioritas DESC, updated_at ASC) AS row_index,email'))
            ->where('kodejadwal', $d->kodejadwal)
            ->get();
            $position = 0;
            foreach($row_index as $r){
                if($r->email == $email){
                    $position = $r->row_index;
                }
            }
            $d->posisi = $position;

        }
    
        return response()->json($data);
    }

    public function deleteIrs(Request $request) {

        // return response()->json(['data' => $request->all()]);

        $request->validate(['id' => 'required']);

        $id = $request->id;
        $data = Irstest::find($id);

        $kodejadwal = $data->kodejadwal;
        $data->delete();

        //count the total sks where email = data[email]
        $user = auth()->user();
        $email = $user->email;
        $picked = Irstest::where('email', $email)->get();
        $total = 0;
        foreach($picked as $p){
            $total += Matakuliah::where('kodemk', $p->kodemk)->first()->sks;
        }


        
        
        return response()->json(['kodejadwal' => $kodejadwal,'sks' => $total]);
    }
}

