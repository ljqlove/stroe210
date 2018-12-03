<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Flash;
use DB;

class FlashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // echo '添加成功';

        $res = Flash::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $fname = $request->input('fname');
               
                //如果用户名不为空
                if(!empty($fname)) {
                    $query->where('fname','like','%'.$fname.'%');
                }
              
            })
        ->paginate(10);

        return view('admin.flash.index',[
            'title'=>'浏览快讯',
            'res'=>$res,
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
        // echo '添加快讯';
         return view('admin.flash.create',[
            'title'=>'快讯的添加页面',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '111';
        $res = $request->except('_token');
        // dd($res);
        $res['ftime'] = date('Y-m-d H:i:s',time());

        // dd($res);
        $rs = Flash::create($res);
        
        if ($rs) {
            return redirect('/admin/flash')->with('success','添加成功');
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
        // dd($id);
        $flash = Flash::where('id','=',$id)->get();

        // dd($flash);
        // echo '修改内容';
        return view('admin.flash.edit',[
            'title'=>'快讯修改页面',
            'flash'=>$flash
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
        $res = $request->only('fname','content');

        $data = Flash::where('id',$id)->update($res);
        // if ($data = Category::where('tid',$id)->update($res)) {
             return redirect('/admin/flash')->with('success','修改成功');
        // }
        // dd($id);
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
            $res = Flash::destroy($id);

            if($res){
                return redirect('/admin/flash')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
