<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use DB;

use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
use App\Model\Admin\Gsize;
use Image;


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


       // 单文件上传
        if($request->hasFile('gpic') && $request->file('gpic')->isValid()){

            $photo = $request->file('gpic');
            //自定义名字
            $file_name = uniqid().'.'.$photo->getClientOriginalExtension();


            $file_path =public_path('uploads/goods');
            $thumbnail_file_path = $file_path . '/friend-'.$file_name;


            $image = Image::make($photo)->resize(500, 500)->save($thumbnail_file_path);


            $res['gpic'] = '/uploads/goods/'.$image->basename;


        }


        $rs = Goods::create($res);


        // dd($rs);


        $id = $rs->gid;


        // 模型关联 一对多

        if($request->hasFile('gimgs') ){

                $photo = $request->file('gimgs');
                $arr = [];
                foreach($photo as $k => $v){
                $ar = [];


                $ar['gid'] = $id;
                //自定义名字
                $file_name = uniqid().'.'.$v->getClientOriginalExtension();


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



        //         $file_path =public_path('uploads/gimgs');
        //         $thumbnail_file_path = $file_path . '/friend-'.$file_name;


        //         $image = Image::make($v)->resize(500, 500)->save($thumbnail_file_path);


        //         $ar['gimgs'] = '/uploads/gimgs/'.$image->basename;

        //         $arr[] = $ar;

        //     }

        // }


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

        // dd($request->except('_token','_method'));
        //  $this->validate($request,[
        //     'gimgs' => 'required',
        // ],[
        //     'gimgs.required' => '商品图片不能为空',
        // ]);
        // 表单验证
        $rs = Goodsimg::where('gid',$id)->get(); // 通过父表id  查询出子表信息

        // dd($rs);

        // 关联删除 gimgs
        if ($request->file('gimgs')) {
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
        }
        // dd($grr);

         $res = $request->except('_token','_method','gimgs');

          if($request->hasFile('gpic') && $request->file('gpic')->isValid()){

            $photo = $request->file('gpic');
            //自定义名字
            $file_name = uniqid().'.'.$photo->getClientOriginalExtension();


            $file_path =public_path('uploads/goods');
            $thumbnail_file_path = $file_path . '/friend-'.$file_name;


            $image = Image::make($photo)->resize(500, 500)->save($thumbnail_file_path);


            $res['gpic'] = '/uploads/goods/'.$image->basename;


        }

         $data = Goods::where('gid',$id)->update($res);

        // 关联表的信息


      if($request->hasFile('gimgs') ){

                $photo = $request->file('gimgs');
                $arr = [];
                foreach($photo as $k => $v){
                  $ar = [];

                    $ar['gid'] = $id;
                //自定义名字
                $file_name = uniqid().'.'.$v->getClientOriginalExtension();


                $file_path =public_path('uploads/gimgs');
                $thumbnail_file_path = $file_path . '/friend-'.$file_name;


                $image = Image::make($v)->resize(500, 500)->save($thumbnail_file_path);


                $ar['gimgs'] = '/uploads/gimgs/'.$image->basename;

                $arr[] = $ar;

            }

            $rs = Goodsimg::where('gid',$id)->insert($arr);

        }





        // if($rs){

            return redirect('/admin/goods')->with('success','修改成功');
        // } else {
            // return redirect('/admin/goods')->with('success','修改成功');
        // }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo '商品删除';

        // 商品参数的删除
        $size = Gsize::where('gid',$id)->get();
        // dd($size);
            $arr = [];
            foreach ($size as $k => $v) {
                unlink('.'.$v->cimgs);

                $sizeid = $v->id;
                $arr[] = $sizeid;
                // dd($sizeid);
            }
            $gsdel = Gsize::destroy($arr);



        // 商品图片的删除
        $rs = Goodsimg::where('gid',$id)->get(); // 查询商品图片gid

        // dd($gimgs);

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




         // dd($goods);

         $res = Goods::destroy($id);
         // $res = Goodsimg::destroy();

        // // 进行判断是否成功
        if ($res || $gsdel) {
            return redirect('/admin/goods')->with('success','删除成功');
        }
        return back()->with('error','删除失败');

        }

        /*
                商品属性
        */


    // 浏览商品属性
    public function gsize(Request $request, $id)
    {
        // echo '商品参数';
        // dd($request->except('_token','gimgs'));

        // dd($goods);
        $gid = $id;
        $res = Gsize::where('gid',$id)->get();
        $goods = Goods::where('gid',$id)->get();
        // $gid = $goods->gid;
        // dd($goods);
        return view('admin.gsize.index',[
            'title'=>'商品属性浏览页面',
            'res'=>$res,
            'goods'=>$goods,
            'gid'=>$gid

        ]);
    }

    // 跳转到商品属性添加页面
    public function gsadd($id)
    {
        // echo '添加商品样式';
        // dd($id);
        $gid = $id;
        $goods = Goods::where('gid',$id)->get();
        return view('admin.gsize.add',[
            'title'=>'商品属性添加页面',
            'goods'=>$goods,
            'gid'=>$gid
        ]);
    }

    // 执行添加尺寸
    public function gsave(Request $request ,$id)
    {
        $this->validate($request,[
            'gcolor' => 'required',
            'gsize' => 'required',
            'cimgs' => 'required',


        ],[
            'gcolor.required' => '商品颜色名不能为空',
            'gsize.required' => '商品尺寸不能为空',
            'cimgs.required' => '商品图片不能为空',


        ]);

        // dd($id);
        $res = $request->except('_token','gname');
        $res['gid'] = $id;
        // dd($res);
       if($request->hasFile('cimgs') && $request->file('cimgs')->isValid()){

            $photo = $request->file('cimgs');
            //自定义名字
            $file_name = uniqid().'.'.$photo->getClientOriginalExtension();


            $file_path =public_path('uploads/cimgs');
            $thumbnail_file_path = $file_path . '/friend-'.$file_name;


            $image = Image::make($photo)->resize(500, 500)->save($thumbnail_file_path);


            $res['cimgs'] = '/uploads/cimgs/'.$image->basename;


        }

        // dd($res);

        $rs = Gsize::create($res);


        if ($rs) {
            return redirect('/admin/goods')->with('success','添加成功');
        } else {
            return back()->with('error','添加失败');
        }

    }

    // 商品修改
    public function gedit($id)
    {
        // echo '商品属性的修改页面';

        // dd($id);
        // $res = Gsize::where('id',$id)->get();
        $res = Gsize::find($id);

        // dd($res['gid']);
        // $rs = $res['gid'];

        // $goods =  Goods::where('gid',$rs)->update($res);

        // dd($res->gcolor);

        return view('admin.gsize.edit',[
            'title'=>'商品属性的修改页面',
            'res'=>$res,
            'id'=>$id
        ]);
    }

    public function gupdate(Request $request, $id)
    {
        $res = $request->except('_token');
        // dd($res);
        // dd($res['cimgs']);

      if($request->hasFile('cimgs') && $request->file('cimgs')->isValid()){

            $photo = $request->file('cimgs');
            //自定义名字
            $file_name = uniqid().'.'.$photo->getClientOriginalExtension();


            $file_path =public_path('uploads/cimgs');
            $thumbnail_file_path = $file_path . '/friend-'.$file_name;


            $image = Image::make($photo)->resize(500, 500)->save($thumbnail_file_path);


            $res['cimgs'] = '/uploads/cimgs/'.$image->basename;


        }

        $rs = Gsize::where('id',$id)->update($res);


        if ($rs) {
            return redirect('/admin/goods')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }

    }

    public function gdelete($id)
    {
        // dd($id);
        $rs = Gsize::find($id);

        unlink('.'.$rs->cimgs);

        $res = Gsize::destroy($id);

        if ($res) {
            return redirect('/admin/goods')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }

}

