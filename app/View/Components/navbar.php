<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $user;

    public function __construct()
    {
        // Get the authenticated user
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('components.navbar');
    }
}
