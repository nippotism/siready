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
        // Access user email
        $userEmail = $user->email;

        // Pass the user data to a view, or return a response
        return view('MhsDashboard', [
            'userName' => $userName,
            'userEmail' => $userEmail,
        ]);
    }
}
