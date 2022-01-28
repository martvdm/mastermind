<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddexperienceController extends Controller
{
    public function Addexperience($experience) {
        $addedexperience = Auth::user()->experience->experience + $experience;
        User_experience::where('user_id', Auth::user()->id)->update(['experience' => $addedexperience]);
    }
}
