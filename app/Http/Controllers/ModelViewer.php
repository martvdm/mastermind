<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Routing\Controller;

class ModelViewer extends Controller
{
    public function Users() {
    $users = users::all();

 return view('test', ['users' => $users]);
}
}
