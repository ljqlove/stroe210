<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Hash;
use App\Model\Admin\User;
use App\Model\Admin\Comment;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //条件搜索 分页
        $users = Comment::orderBy('uid','asc')->where(function($query) use($request){
            $rs = $request->input('phone');
            if(!empty($rs)) {
                $query->where('phone','like','%'.$rs.'%');
            }
        })->paginate(5);

        return view('admin.user.index',[
            'title'=>'用户列表',
            'users'=>$users

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add',['title'=>'添加会员']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {   
        $res = $request->except('_token','repass');

        //往数据表里面添加数据
        $res['password'] = Hash::make($request->password);
        $res['inputtime'] = date('Y-m-d H:i:s',time());


            $data = Comment::create($res);
            
            if ($data) {
                return redirect('/admin/user')->with('success','添加成功');
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
        //根据id获取数据
        $res=Comment::find($id);

        return view('admin.user.edit',[
            'title'=>'用户修改',
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
        $res = $request->except('_token','_method');;

        //数据表修改数据
        try{

            $data = Comment::where('uid', $id)->update($res);
            
            if($data){
                return redirect('/admin/user')->with('success','修改成功');
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
        try{
            $res = Comment::destroy($id);
            
            if($res){
                return redirect('/admin/user')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
