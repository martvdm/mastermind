<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Routing\Controller;

class ModelViewer extends Controller
{
    public function Users() {
    $users = Auth::user()->roles->permission;
    dd($users);
}
}
