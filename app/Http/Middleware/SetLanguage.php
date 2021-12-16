<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLanguage
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
        $languagestandard = $request->language;
        $langoptions = session()->get('lang');

        if(isset($langoptions)) {
            $langsetted = $langoptions;
        } else {
            $langsetted = $languagestandard;
        }
        \App::setLocale($langsetted);
        return $next($request);
    }
}
