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
        if ($user_level == 1) {
            $user_level = Auth::user()->experience->level;
        }
        $calculateexperience = level::where('level',$user_level)->first()->experience;

        $user_experience = Auth::user()->experience->experience - $calculateexperience;
        $user_neededexperience = Auth::user()->experience->levellist->experience - $calculateexperience;

        if ($user_experience > 0) {
            $user_progress = round((100 * ($user_experience / $user_neededexperience)), 2);
        } else {
            $user_progress = 0;
        }
        return view('users.profile', ['user_experience' => $user_experience, 'user_neededexperience' => $user_neededexperience, 'user_progress' => $user_progress]);
    }
    public function Update_profile(Request $request) {

    }
}
