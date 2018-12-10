<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Model\Admin\Blog_user;
use App\Model\Admin\Blog_roles;
use App\Model\Admin\Blog_permissions;

class UserPermissionMiddleware
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
        

        //获取用户信息
        $uid = session('uid');
        $users = Blog_user::find($uid);
        // dd($users);
        //通过用户的信息查找角色
        $roles = $users->roles;
        // dump($roles);
        $pers = [];
        foreach($roles as $k =>$role_id){
            //通过角色查找权限
            $rles = $role_id->pers;
            foreach($rles as $k => $v){

                $pers[] =$v->name;
            }

        }
        $urls = array_unique($pers);
        // dump($urls);

        $active = \Route::current()->getActionName();
        $action = list($class, $method) = explode('@', $active);
        $active = $action[0];
        // dump($active);

        // 判断  该用户有哪些权限
        if(in_array($active,$urls) || $uid == 1){
            //如果角色有权限
            return $next($request);
        }else{
            // 如果角色没有权限  提示页面  没有权限不能访问
            return redirect('/admin/remind');
        }
        // return $next($request);
    }
}
