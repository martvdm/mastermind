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
use Illuminate\Database\Eloquent\Builder;


use Illuminate\Routing\Controller;

class ModelViewer extends Controller
{
//    public function Users()
//    {
//        $games = game::all()->sortByDesc('score')->unique('user_id');
//
//        $users = array();
//        foreach ($games as $game){
//            $user = User::where('id', $game->user_id)->First();
//            $users[$user->id] = ['name' => $user->name, 'picture' => $user->picture, 'role_id' => $user->role_id, 'level' => $user->experience->level];
//        }
//        dd($users[1]);
//
//
//    }


}
