<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Lunbo;
use App\Http\Requests\LunboRequest;


class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lunbo=DB::table('lunbo')->paginate(5);
        return view('admin.lunbo.index',[
            'title'=>'轮播图列表',
            'lunbo'=>$lunbo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lunbo.add',['title'=>'添加轮播图']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LunboRequest $request)
    {
        $res = $request->except('_token');

        if($request->hasFile('pic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./images/lunbo/',$name.'.'.$suffix);

            $res['pic'] = '/images/lunbo/'.$name.'.'.$suffix;

        }
            $data = Lunbo::create($res);
            
            if ($data) {
                return redirect('/admin/lunbo')->with('success','添加成功');
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
        $res=Lunbo::find($id);

        return view('admin.lunbo.edit',[
            'title'=>'轮播图修改',
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
        $res = $request->except('_token','_method');

        if($request->hasFile('pic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./images/lunbo/',$name.'.'.$suffix);

            $res['pic'] = '/images/lunbo/'.$name.'.'.$suffix;

        }

        //数据表修改数据
        try{

            $data = Lunbo::where('lid', $id)->update($res);
            
            if($data){
                return redirect('/admin/lunbo')->with('success','修改成功');
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

            $res = Lunbo::destroy($id);
            
            if($res){
                return redirect('/admin/lunbo')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
