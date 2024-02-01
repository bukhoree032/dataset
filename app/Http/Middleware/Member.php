<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::guard('member')->check()){
            return redirect()->route('member.login');
            //abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
