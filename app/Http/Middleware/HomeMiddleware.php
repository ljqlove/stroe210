<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class HomeMiddleware
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
        // 获取站点的状态
        $site = DB::table('site')->first();
        // dd($site->statue);
        if ($site->statue == 'ON') {
            return $next($request);
        }else{
           return redirect('/home/remind');
        }
        return $next($request);
    }
}
