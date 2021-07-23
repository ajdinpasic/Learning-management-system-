<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsProfileForYou
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
        $user = $request->route()->parameters();
        $user = $user['user']->id;
        if ($user != auth()->user()->id) {
            return back();
        }

        return $next($request);
    }
}
