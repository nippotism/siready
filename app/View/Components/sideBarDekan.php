<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class SideBarDekan extends Component
{
    public $user;

    public function __construct()
    {
        // Get the authenticated user
        $this->user = Auth::user();
    }

    public function render()
    {
        // Pass the user variable to the Blade view
        return view('components.side-bar-dekan', ['user' => $this->user]);
    }
}
