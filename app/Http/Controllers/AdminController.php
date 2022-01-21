<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function Dashboard() {
        if (Auth::user()->power == 'admin') {
            return view('admin.dashboard', ['users' => User::all()]);
        } else {



            return redirect('/');
        }
    }
}
