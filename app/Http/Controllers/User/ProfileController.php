<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function Show() {
        $user_level = Auth::user()->experience->level-1;
        $calculateexperience = level::where('level',$user_level)->first()->experience;

        $user_experience = Auth::user()->experience->experience - $calculateexperience;
        $user_neededexperience = Auth::user()->experience->levellist->experience - $calculateexperience;
        $user_progress = floor(100* ($user_experience / $user_neededexperience));
        return view('users.profile', ['user_experience' => $user_experience, 'user_neededexperience' => $user_neededexperience, 'user_progress' => $user_progress]);
    }
}
