<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
use App\Model\Admin\Gsize;
use DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = Category::select(DB::raw('*,CONCAT(path,tid) as paths'))->where('tname','like','%'.$request->tname.'%')->
        orderBy('paths')->
        paginate($request->input('num',10));

        $pids = DB::select('select tid,tname from type');

        foreach ($res as $v) {
            $ps = substr_count($v->path, ',')-1;

            // 拼接  分类名
            $v->tname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->tname;
        }

        return view('admin.category.index',[
            'title'=>'分类列表',
            'request'=>$request,
            'res'=>$res,
            'pids'=>$pids

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $rs = Category::select(DB::raw('*,CONCAT(path,tid) as paths'))->
        // orderBy('paths')->
        // get();
        $rs = DB::select('select *,concat(path,tid) as paths from type order by paths');
        // dd($rs);
        foreach ($rs as $v) {
            // path
            $ps = substr_count($v->path,',')-1;

            $v->tname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->tname;
        }
        // 查询表里面的信息
       return view('admin.category.add',[
        'title'=>'分类添加',
        'rs'=>$rs
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

        // 表单验证
        $this->validate($request,[
            'tname' => 'required',
        ],[
            'tname.required' => '类名不能为空',
        ]);

        $res = $request->except('_token');

        if ($request->pid == '0') {
            $res['path'] = '0,';
        } else {
            // 查询数据
            $rs = DB::table('type')->where('tid',$request->pid)->first();
            $res['path'] = $rs->path.$rs->tid.',';
        }

        // dd($res);
        // 往数据表里面进行添加
        // try{

            // $data = Category::create($res);

            if ($data = Category::create($res)) {
                return redirect('/admin/category')->with('success','添加成功');
            }

        // }catch(\Exception $e){

            return back()->with('error','添加失败');
        // }
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
        $rs = Category::select(DB::raw('*,CONCAT(path,tid) as paths'))->
        orderBy('paths')->
        get();

        foreach($rs as $v){

            //path
            $ps = substr_count($v->path,',')-1;

            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->catname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->catname;

        }

        $res = Category::find($id);

        return view('admin.category.edit',[
            'title'=>'分类修改页面',
            'res'=>$res,
            'rs'=>$rs
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
        $res = $request->only('status','tname');

        $data = Category::where('tid',$id)->update($res);
        // if ($data = Category::where('tid',$id)->update($res)) {
             return redirect('/admin/category')->with('success','修改成功');
        // }
        // return back()->with('error','修改失败');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $posts = Category::where('pid',$id)->first();


        if ($posts) {
            return back()->with('error','该板块下面有帖子,不能删除');
        }

        //商品的删除开始

        $goods = Goods::where('tid',$id)->get();

        $gid = []; // 保存类别下的商品的ID

        foreach ($goods as $k => $v) {
            $gid[] = $v->gid;

        }
         // dd($gid);
            // 商品参数的删除开始

            $size =[];
            foreach ($gid as $k => $v) {
                $size[] = Gsize::where('gid',$v)->get();
            }

            // $size = Gsize::where('gid',$gid)->get();
            // dd($size);
            $arr = [];
            foreach ($size as $k => $v) {
                foreach ($v as $sk => $sv) {
                     unlink('.'.$sv->cimgs); // 删除商品参数的图片
                    $sizeid = $sv->id;
                    $arr[] = $sizeid;
                }

                // dd($sizeid);
            }

            // dd($arr);
            $d1 = Gsize::destroy($arr); // 删除商品参数

            // 商品参数的删除结束

            // 商品图片的删除开始
            $imgs = []; // 存储商品的ID
            foreach ($gid as $k => $v) {
                 $imgs[] = Goodsimg::where('gid',$v)->get(); // 查询商品图片gid
            }
            // dd($imgs);
            $grr = [];
            foreach ($imgs as $k => $v) {
                foreach ($v as $ik => $iv) {
                    unlink('.'.$iv->gimgs); // 删除文件夹中的图片名文件
                    $imgsid = $iv->id;
                    $grr[] = $imgsid;
                }

            }

            $d2 = Goodsimg::destroy($grr); // 删除商品图片



            // 商品图片的删除结束

            $d3 = Goods::destroy($gid); // 删除商品信息

        // 商品的删除结束


         $res = Category::destroy($id);

        // // 进行判断是否成功
        if ($res || $d1 || $d2 || $d3) {
            return redirect('/admin/category')->with('success','删除成功');
        }
        return back()->with('error','删除失败');
    }
}
