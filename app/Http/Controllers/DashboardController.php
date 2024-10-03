<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Access user name
        $userName = $user->name;
        $status = $user->status;
        $ipk = Mahasiswa::where('email', $user->email)->first()->ipk;
        $semester_berjalan = Mahasiswa::where('email', $user->email)->first()->semester_berjalan;

        $data = [
            'userName' => $userName,
            'status' => $status,
        ];

        // Pass the user data to a view, or return a response
        return view('MhsDashboard',compact('data', 'ipk', 'semester_berjalan'));
    }
    public function index2()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Access user name
        $userName = $user->name;
        $status = $user->status;

        $data = [
            'userName' => $userName,
            'status' => $status
        ];

        // Pass the user data to a view, or return a response
        return view('paDashboard',compact('data'));
    }
    public function index3()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Access user name
        $userName = $user->name;
        $status = $user->status;

        $data = [
            'userName' => $userName,
            'status' => $status
        ];

        // Pass the user data to a view, or return a response
        return view('MhsDashboard',compact('data'));
    }
    public function index4()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Access user name
        $userName = $user->name;
        $status = $user->status;

        $data = [
            'userName' => $userName,
            'status' => $status
        ];

        // Pass the user data to a view, or return a response
        return view('MhsDashboard',compact('data'));
    }
}
