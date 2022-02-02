<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\level;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function Show()
    {
        $user_level = Auth::user()->experience->level - 1;

        $calculateexperience = level::where('level', $user_level)->first()->experience;

        $user_experience = Auth::user()->experience->experience - $calculateexperience;
        $user_neededexperience = Auth::user()->experience->levellist->experience - $calculateexperience;

        if ($user_experience > 0) {
            $user_progress = round((100 * ($user_experience / $user_neededexperience)), 1);
        } else {
            $user_progress = 0;
        }
        return view('users.profile', ['user_experience' => $user_experience, 'user_neededexperience' => $user_neededexperience, 'user_progress' => $user_progress]);
    }

    public function Update_profilepicture(Request $request)
    {
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $file = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/uploads/pictures/' . $file));
            $user = Auth::user();
            User::where('id', $user->id)->update(['picture' => $file]);

        };
        return redirect('/account/settings')->with('message', __('Succesvol Opgeslagen'));
    }

    public function Update_profile(UpdateProfileRequest $request)
    {

        if (Hash::check($request->current_password, Auth::user()->password)){
            User::where('id', Auth::user()->id)->update(['email' => $request->email, 'name' => $request->name]);
        if ($request->input('password')) {
            User::where('id', Auth::user()->id)->update(['password' => bcrypt($request->input('password'))]);
        }
        }
        return redirect('/account/settings')->with('message', __('Succesvol Opgeslagen'));
    }
}
