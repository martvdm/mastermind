<?php

namespace App\Http\Controllers;

use App\Models\game;
use App\Models\User_experience;
use Illuminate\Http\Request;
use App\Models\User;

class LeaderboardController extends Controller
{
    public function Give()
    {
        $games = game::all()->sortByDesc('score')->unique('user_id')->take(10);

        $users = array();
        foreach ($games as $game){
            $user = User::where('id', $game->user_id)->First();
            $users[$user->id] = ['name' => $user->name, 'picture' => $user->picture, 'role_id' => $user->role_id, 'level' => $user->experience->level];
        }
        return view('index', ['users' => $users, 'games' =>$games]);


    }
}
