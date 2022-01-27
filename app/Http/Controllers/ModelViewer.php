<?php

namespace App\Http\Controllers;
use App\Models\user_experience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;


use Illuminate\Routing\Controller;

class ModelViewer extends Controller
{
    public function Users() {


    $user_experience = Auth::user()->experience->experience;
    $user_level = Auth::user()->experience->level;

    $user_nextlevel = floor(($user_experience / ($user_level * -2000)) *-1);

//    if($user_experience > $experienceneeded) {
//        $user_experience = ($experienceneeded - $user_experience) * -1;
//        $user_level = $user_nextlevel;
//        user_experience::where('user_id', $user_id)->update(['level'=>$user_level, 'experience' => $user_experience]);
//        $this->Users();

        user_experience::where('user_id', Auth::user()->id)->update(['level'=>$user_nextlevel]);
    }
}
