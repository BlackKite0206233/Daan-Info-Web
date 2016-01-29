<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class teacherMiddleware
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
        $user = Auth::user();
        if($user->category == "t")
            return $next($request);
        else
            return redirect()->intended('/');
    }
}
