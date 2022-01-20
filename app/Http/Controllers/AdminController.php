<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function Dashboard() {
        if (Auth::user()->power == 'admin') {
            Return view('admin.dashboard');
        } else {
            return redirect('/');
        }
    }
}
