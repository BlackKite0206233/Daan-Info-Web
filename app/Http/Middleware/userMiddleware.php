<?php
//登入才可進入
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
            return redirect('login');//如果不是->導向到登入化面
    }
}
