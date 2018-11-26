<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use DB;

use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = Goods::orderBy('gid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $gname = $request->input('gname');
               
                //如果用户名不为空
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
              
            })
        ->paginate($request->input('num', 5));

        $cate = Category::select();

        return view('admin.goods.index',[
            'title'=>'商品的列表页',
            'res'=>$res,
            'request'=>$request,
            'cate'=>$cate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rs = Category::select(DB::raw('*,CONCAT(path,tid) as paths'))->
        orderBy('paths')->
        get();

        foreach ($rs as $k => $v) {
            $ps = substr_count($v->path, ',')-1;

            $v->tname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->tname;
        }

        return view('admin.goods.add',[
            'title'=>'商品的添加页面',
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
         $this->validate($request,[
            'gname' => 'required',
            'company' => 'required',
            'descript' => 'required',
            'stock' => 'required',
            'gimgs' => 'required',
        ],[
            'gname.required' => '商品名不能为空',
            'company.required' => '生产厂家不能为空',
            'descript.required' => '简介不能为空',
            'stock.required' => '库存量不能为空',
            'gimgs.required' => '商品图片不能为空',
        ]);

        // echo '213213211';
        $res = $request->except('_token','gimgs');
            
        // dd($req);
        $res['inputtime'] = date('Y-m-d H:i:s',time());

        // 文件上传

        if ($res['gpic']) {
                // $ar['gid'] = $id;

                $v = $res['gpic'];

                //设置名字
                $name = rand(1111,9999).time();

                //后缀
                $suffix = $v->getClientOriginalExtension();

                //移动
                $v->move('./uploads/goods', $name.'.'.$suffix);

                $res['gpic'] = '/uploads/goods/'.$name.'.'.$suffix;

        }

        $rs = Goods::create($res);

        // dd($rs);

        $id = $rs->gid;

        // 模型关联 一对多
        if($request->hasFile('gimgs')){

            $file = $request->file('gimgs'); //$_FILES

            $arr = [];
            foreach($file as $k => $v){

                $ar = [];

                $ar['gid'] = $id;

                //设置名字
                $name = rand(1111,9999).time();

                //后缀
                $suffix = $v->getClientOriginalExtension();

                //移动
                $v->move('./uploads/gimgs', $name.'.'.$suffix);

                $ar['gimgs'] = '/uploads/gimgs/'.$name.'.'.$suffix;

                $arr[] = $ar;

                
            }

            // dd($arr)
// $imgs = Goodsimg::create($arr);

        }

        // 插入数据  

        // 一对多
        $data = Goods::find($id);
        // dd($data);
        try{
            $gs = $data->gis()->createMany($arr);
        // dd($gs);
        if($gs){
                return redirect('/admin/goods')->with('success','添加成功');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo '111';

        $rs = Category::select(DB::raw('*,CONCAT(path,tid) as paths'))->
        orderBy('paths')->
        get();

        foreach ($rs as $k => $v) {
            $ps = substr_count($v->path, ',')-1;

            $v->tname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->tname;
        }

     

        $res = Goods::find($id);

        $gimgs = Goodsimg::where('gid',$id)->get();

        // dd($gimgs);
        return view('admin.goods.edit',[
            'title'=>'商品的修改页面',
            'rs'=>$rs,
            'res'=>$res,
            'gimgs'=>$gimgs

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
         $this->validate($request,[
            'gimgs' => 'required',
        ],[
            'gimgs.required' => '商品图片不能为空',
        ]);
        // 表单验证
        $rs = Goodsimg::where('gid',$id)->get(); // 通过父表id  查询出子表信息

        // dd($rs);

        // 关联删除 gimgs
        // if ($_FILES['gimgs']['error']!=4) {
        $grr = []; // 定义一个数组
        foreach($rs as $v){
            $gr = $v->gimgs;  // 获取图片名
            // $grr[] = $gr;
            unlink('.'.$v->gimgs); // 删除文件夹中的图片名文件
            $gs = Goodsimg::where('gimgs',$gr)->get(); // 通过图片名获取图片所有信息
            
            foreach ($gs as $v) { // 遍历图片信息
                $gid = $v->id; // 获取图片id
                $grr[] = $gid; // 写入数组
                Goodsimg::destroy($grr); // 删除图片id
            }
        }
        // }
        // dd($grr);

         $res = $request->except('_token','_method','gimgs');

          if ( $_FILES['gpic']['error']!=4) {
                // $ar['gid'] = $id;

                $v = $res['gpic'];

                //设置名字
                $name = rand(1111,9999).time();

                //后缀
                $suffix = $v->getClientOriginalExtension();

                //移动
                $v->move('./uploads/goods', $name.'.'.$suffix);

                $res['gpic'] = '/uploads/goods/'.$name.'.'.$suffix;

            }

         $data = Goods::where('gid',$id)->update($res);

        // 关联表的信息
         
       if ($_FILES['gimgs']['error']!=4) {
            if($request->hasFile('gimgs')){

                $file = $request->file('gimgs'); //$_FILES

                $arr = [];
                foreach($file as $k => $v){

                    $ar = [];

                    $ar['gid'] = $id;

                    //设置名字
                    $name = rand(1111,9999).time();

                    //后缀
                    $suffix = $v->getClientOriginalExtension();

                    //移动
                    $v->move('./uploads/gimgs', $name.'.'.$suffix);

                    $ar['gimgs'] = '/uploads/gimgs/'.$name.'.'.$suffix;

                    $arr[] = $ar;
                }
            }
      }


        $rs = Goodsimg::where('gid',$id)->insert($arr);


        if($rs){

            return redirect('/admin/goods')->with('success','修改成功');
        }// else {
            // return redirect('/admin/goods')->with('success','修改成功');
        //}




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo '商品删除';
    }

    public function gsize($id)
    {
        echo '商品参数';
    }
}
