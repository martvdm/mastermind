<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\level;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Image;

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
        if ($request->hasFile('picture')){
            $picture = $request->file('picture');
            $file = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(200, 200)->save(public_path('/uploads/pictures/' . $file));
            $user = Auth::user();
            User::where('id', $user->id)->update(['picture' => $file]);

        };
        return redirect('/account/settings');
    }
}
