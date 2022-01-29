<?php

namespace App\Http\Middleware;
use App\Models\level;
use Closure;
use Illuminate\Http\Request;
use App\Models\User_experience;
use Illuminate\Support\Facades\Auth;

class Checklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !isset(Auth::user()->experience)) {
            User_experience::create(['user_id' => Auth::user()->id, 'level'=> 1, 'experience' => 0]);
        } elseif(Auth::check() && isset(Auth::user()->experience->level)) {
            $user_experience = Auth::user()->experience->experience;

            $user_level = Auth::user()->experience->level;
//            $user_nextlevel = floor(($user_experience / $neededexperience)*100)-$user_experience);
            $user_nextlevel = $user_level;

            for ($experienceneeded = Auth::user()->experience->levellist->experience; $user_experience > $experienceneeded; $user_nextlevel++) {
                $experienceneeded = ($experienceneeded + 280) * (($user_nextlevel/10)+1);
            };
            $user_nextlevel;

            if ($user_nextlevel > $user_level) {
                User_experience::where('user_id', Auth::user()->id)->update(['level' => $user_nextlevel]);

            }
        }
        return $next($request);
    }
}
