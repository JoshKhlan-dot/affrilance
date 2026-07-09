<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelancerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('freelancer.dashboard', compact('user'));
    }
}