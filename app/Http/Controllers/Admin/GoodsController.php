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
    public function index()
    {
        //
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
