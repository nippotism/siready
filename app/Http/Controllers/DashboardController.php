<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $data = [
            'userName' => $userName,
            'status' => $status
        ];

        // Pass the user data to a view, or return a response
        return view('MhsDashboard',compact('data'));
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
