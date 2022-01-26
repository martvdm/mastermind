<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function Users() {

            return view('admin.users', ['users' => User::all()]);
    }
    public function Roles() {
        return view('admin.roles.show', ['roles' => Role::all()]);

    }
}
