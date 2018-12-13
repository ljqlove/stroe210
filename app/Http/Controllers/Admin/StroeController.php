<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class StroeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = '%%';
        $rs = trim($request->input('company'));
        if(!empty($rs)) {
            $res ='%'.$rs.'%';
        }
        $list = DB::table('stores')->where('company','like',$res)->orderBy('create_at','desc')->paginate(7);
        return view('admin.stroe.index',['title'=>'商家管理','lists'=>$list]);
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
        $data = $request -> except('_token','id');
        $id = $request -> id;
        $data['status']='1';
        // dd($data,$id);
        $res = DB::table('stores')->where('id',$id)->update($data);
        if ($res) {
            return back()->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sinfo = DB::table('stores')->where('id',$id)->first();

        return view('admin.stroe.stroeinfo',['title'=>'商家信息','sinfo'=>$sinfo]);

    }

    public function stroesub2($id)
    {
        $res = DB::table('stores')->where('id',$id)->update(['status'=>'2']);
        if ($res) {
            return back()->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }

    }

    public function ajaxstroe(Request $request,$id)
    {
        //获取上传的文件对象
        $file = $request->file('image');
         // var_dump($file);die;
         //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            $path = $file->move('./uploads/images/',$newName);


            $filepath = '/uploads/images/'.$newName;


            $res['image'] = $filepath;
            DB::table('stores')->where('id',$id)->update($res);
            //返回文件的路径
            return  $filepath;
        }

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
