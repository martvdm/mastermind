<?php

namespace App\Http\Controllers;
use App\Models\game;
use App\Models\User_experience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


use Illuminate\Routing\Controller;

class ModelViewer extends Controller
{
    public function Users() {
       $leveltop = User::all()->only(['experience', 'name']);;
      dd($leveltop);
    }
}
