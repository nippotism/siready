<?php

namespace App\Http\Controllers\Api;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function index(){

        $user = auth()->user();
        $email = $user->email;


        $mhs = Mahasiswa::where('email', $email)->first();

        return response()->json(['data' => $mhs]);


    }
}
