<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        // 检测session信息
        $userinfo = Session('userinfo');
        if (empty($userinfo)) {
            return redirect('/home/login');
        } else {
            return $next($request);
        }
    }
}
