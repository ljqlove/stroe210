<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Blog_user;
use Hash;

class Blog_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // 条件搜索  分页
        $user = Blog_user::orderBy('user_id','asc')
                ->where(function($query) use($request){
            $rs = $request->input('user_name');
            if(!empty($rs)) {
                $query->where('user_name','like','%'.$rs.'%');
            }
        })->paginate(5);
        // dd($user);
        return view('admin.blog_user.index',[
            'title'=>'角色详情界面',
            'user'=>$user,
            'request'=>$request
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog_user.add',['title'=>'添加管理员']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'user_name' => 'required|regex:/^\w{3,16}$/',
            'user_pass' => 'required|regex:/^\S{3,12}$/',
            'password'=>'same:user_pass',
        ],[
            'user_name.required' => '用户名不能为空',
            'user_name.regex'=>'用户名格式不正确',
            'user_pass.required'  => '密码不能为空',
            'user_pass.regex'  => '密码格式不正确',
            'password.same'=>'两次密码不一致',
        ]);


        //
        $res = $request->except('_token','password');
        // dd($res);

        //往数据表里面添加数据
        $res['user_pass'] = Hash::make($request->user_pass);
        $res['created_at'] = date('Y-m-d H:i:s',time());


        $data = Blog_user::create($res);

        if ($data) {
            return redirect('/admin/blog_user')->with('success','添加成功');
        }
            return back()->with('error','添加失败');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // echo 1;die;
        $res = Blog_user::find($id);
        // dd($res);

        return view('admin.blog_user.edit',[
            'title'=>'角色修改页面',
            'res'=>$res
        ]);
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
    }
}
