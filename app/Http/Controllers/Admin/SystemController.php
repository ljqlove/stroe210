<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\System;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;
use App\Model\Admin\Blog_user;
use App\Model\Admin\Blog_roles;


class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user= DB::table('blog_user')->get();
        // dump($user);die;
        $roles = DB::table('blog_roles')->get();
        // dd($roles);
        $role_user = DB::table('blog_role_user')->get();
        // dd($role_user);
        // 条件搜索  分页
        $system = System::orderBy('id','asc')
                ->where(function($query) use($request){
            $rs = $request->input('uname');
            if(!empty($rs)) {
                $query->where('uname','like','%'.$rs.'%');
            }
        })->paginate(10);
        // dd($system);
        return view('admin.system.index',[
            'title'=>'系统日志',
            'system'=>$system,
            'request'=>$request,
            'roles'=>$roles,
            'role_user'=>$role_user,
            'user'=>$user,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 禁止登陆操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $uid = $id;
        try{
        
            $data = DB::update('update blog_user set status="0" where user_id=?',[$uid]);
            if($data){
                return redirect('/admin/system')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
         try {
            $res = System::destroy($id);
            if ($res) {
                return redirect('/admin/system')->with('success','删除成功');
            }
        } catch (\Exception $e) {
            return back()->with('error','删除失败');
        }
    }

    /**
     * 禁止登陆操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function do_update(Request $request)
    {
        //

        $uid = $request->id;
        
        try{
        
            $data = DB::update('update blog_user set status="1" where user_id=?',[$uid]);
            if($data){
                return redirect('/admin/system')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }

    }
}
