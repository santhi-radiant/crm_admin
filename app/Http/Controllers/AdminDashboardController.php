<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show_dashboard()
    {
        return view('dashboard');
    }
}
