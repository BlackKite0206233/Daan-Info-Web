<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class userMiddleware
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
        if(session('status') != 'guest' && session('status') != NULL)
            return $next($request);
        else
            return redirect('login');
    }
}
