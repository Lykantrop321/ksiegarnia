<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Możesz dodać logikę specyficzną dla admina tutaj
        return view('admin.dashboard');
    }
}
