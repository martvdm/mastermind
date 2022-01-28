<?php

namespace App\Http\Middleware;
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
            $user_nextlevel = floor(($user_experience / ($user_level * -280)) * -1);
            if ($user_nextlevel > $user_level) {
                User_experience::where('user_id', Auth::user()->id)->update(['level' => $user_nextlevel]);
            }
        }
        return $next($request);
    }
}
