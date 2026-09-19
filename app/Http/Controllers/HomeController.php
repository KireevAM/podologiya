<?php

namespace App\Http\Controllers;

use App\Models\Branch;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'branches' => Branch::where('is_active', true)->orderBy('city')->get(),
        ]);
    }
}
