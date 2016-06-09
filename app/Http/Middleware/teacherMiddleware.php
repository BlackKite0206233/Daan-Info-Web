<?php
//只允許老師、系統管理員進入
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
        if(session('status') == 'teacher')
            return $next($request);
        else
            return redirect('/login');//如果不是->導向到登入化面
    }
}
