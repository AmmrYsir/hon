<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function admin()
    {
        $users = User::with('roles')->latest()->paginate(20);

        return view('dashboard.admin', compact('users'));
    }
}
