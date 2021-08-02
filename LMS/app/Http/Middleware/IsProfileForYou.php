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
        $user_id = $user['user']->id;
        $user_role = auth()->user()->role;
        //dd($user_id);
        /*if ($user_id != auth()->user()->id) {

            if ($user_role != 'admin') {
                return back();
            }
        } */

        if ($user_role == 'user') {
            if ($user_id != auth()->user()->id) {
                return back();
            }
            return $next($request);
        }

        return $next($request);
    }
}
