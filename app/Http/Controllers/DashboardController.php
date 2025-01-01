<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the appropriate dashboard based on user role.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return view('admin.dashboard');
        } elseif ($user->hasRole('worker')) {
            return view('worker.dashboard');
        } elseif ($user->hasRole('user')) {
            return view('user.dashboard');
        } else {
            return redirect('/'); // Redirect to home if the user doesn't have a role
        }
    }
}
