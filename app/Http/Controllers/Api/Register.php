<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;

class Register extends Controller
{
    //

    public function registerStatus(Request $request)
    {

        // return response()->json(['message' => 'Status Mahasiswa Berhasil Diubah', 'data' => $request->all()]);

        
        //change status mahasiwa where email  = email request body
        $user = auth()->user();
        $email  = $user->email;
        $status = $request->status;
        $mahasiswa = User::where('email', $email)->first();
        $mahasiswa->status = $status;
        // return response()->json(['message' => 'Status Mahasiswa Berhasil Diubah', 'data' => $mahasiswa]);
        
        $mahasiswa->save();

        $data = Mahasiswa::where('email', $email)->first();

        return response()->json(['message' => 'Status Mahasiswa Berhasil Diubah', 'data' => $mahasiswa]);

        
        
    }

    public function statusMahasiswa()
    {
        $data = Mahasiswa::all();
        return response()->json(['data' => $data]);
    }
}
