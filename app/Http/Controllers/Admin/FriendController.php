<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Firend;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 条件搜索  分页
        $friend = Firend::orderBy('fid','asc')
                ->where(function($query) use($request){
            $rs = $request->input('fname');
            if(!empty($rs)) {
                $query->where('fname','like','%'.$rs.'%');
            }
        
        })->paginate(10);
        // dd($friend);
        return view('admin.firend.index',[
            'title'=>'友情链接列表界面',
            'friend'=>$friend,
            'request'=>$request
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
        return view('admin.firend.add',['title'=>'添加链接']);
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
        // echo 1;die;
                //表单验
                // dd($res);

        $this->validate($request, [
            'fname' => 'required',
            'url' => 'required',
            'fpic'=>'required'
        ],[
            'fname.required' => '链接名称不能为空',
            'url.required'  => '地址不能为空',
            'fpic.required'=>'请上传图片'
        ]);
        $res = $request->except('_token','fipc');
        $time = time();
        $res['inputtime'] = ($time=(date('Y-m-d H:i:s')));

        if($request->hasFile('fpic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('fpic')->getClientOriginalExtension();

            $request->file('fpic')->move('./images/friends/uploads',$name.'.'.$suffix);

            $res['fpic'] = '/images/friends/uploads/'.$name.'.'.$suffix;

        }

        try{

            $data = Firend::create($res);
            
            if($data){
                return redirect('/admin/firend')->with('success','添加成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fid)
    {
        // dd($fid);
        $res = Firend::find($fid);
        // dd($res);

        return view('admin.firend.edit',[
            'title'=>'友情链接的修改页面',
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
        // echo 1;die;
        // $this->validate($request, [
        //     'fname' => 'required',
        //     'url' => 'required',
        //     'fpic'=>'required'
        // ],[
        //     'fname.required' => '链接名称不能为空',
        //     'url.required'  => '地址不能为空',
        //     'fpic.required'=>'请上传图片'
        // ]);
        $res = $request->except('_token','fipc','_method');
        // dd($res);
        $time = time();
        $res['inputtime'] = ($time=(date('Y-m-d H:i:s')));

        if($request->hasFile('fpic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('fpic')->getClientOriginalExtension();

            $request->file('fpic')->move('./images/friends/uploads',$name.'.'.$suffix);

            $res['fpic'] = '/images/friends/uploads/'.$name.'.'.$suffix;

        }

        try{

            $data = Firend::where('fid', $id)->update($res);
            // dd($data);
            
            if($data){
                return redirect('/admin/firend')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }

    }

    /**
     *  删除链接
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // echo 1;die;
        try {
            $res = Firend::destroy($id);
            if ($res) {
                return redirect('/admin/firend')->with('success','删除成功');
            }
        } catch (\Exception $e) {
            return back()->with('error','删除失败');
        }
    }
}
