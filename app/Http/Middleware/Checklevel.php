<?php

namespace App\Http\Middleware;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use App\Models\user_experience;
use Closure;
use Illuminate\Http\Request;
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
        if ($request->expectsJson() && !isset(Auth::user()->experience->level)) {
            $levelData = array('user_id' => Auth::user()->id, 'experience' => 0, 'level' => 0);
            $user = new user_experience();
            $user->user_id = Auth::user()->id;
            $user->experience = 0;
            $user->level = 0;
            $user->save();


        } elseif(isset(Auth::user()->experience->level)) {
            $user_experience = Auth::user()->experience->experience;
            $user_level = Auth::user()->experience->level;

            $user_nextlevel = floor(($user_experience / ($user_level * -2000)) * -1);

            user_experience::where('user_id', Auth::user()->id)->update(['level' => $user_nextlevel]);
        }
        return $next($request);
    }
}
