<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class StroeController extends Controller
{
    public function stroe($id)
    {
        $stroe = DB::table('stores')->where('id',$id)->first();
        $good = DB::table('goods')->where('company',$id)->whereIn('status',['1','2'])->get();
        return view('home.ljq.stroe',['title'=>'店铺','stroe'=>$stroe,'goods'=>$good]);
    }

    public function myStroe()
    {
        $uid = Session('userinfo')['uid'];
        $myStroe = DB::table('stores')->where('uid',$uid)->get();
        // dd($myStroe);
        return view('home.ljq.myStroe',['title'=>'我的店铺','myStroe'=>$myStroe]);
    }

    public function myStroeInfo($id)
    {
        $myStroeInfo = DB::table('stores')->where('id',$id)->first();
        $goods = DB::table('goods')->where('company',$id)->whereIn('status',['1','2'])->get();
        // dd($goods);
        return view('home.ljq.myStroeInfo',['title'=>'店铺详情','myStroeInfo'=>$myStroeInfo,'goods'=>$goods]);
    }

    public function select(Request $request)
    {
        $pid = $request -> pid;
        $arr = DB::table('type')->where('pid',$pid)->get();
        $data = json_encode($arr);
        echo $data;
    }

    public function addgood(Request $request)
    {
        // $res = $request -> post();
        // dd($res);
        $this->validate($request, [
            'type1' => 'required',
            'gname' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'gcolor' => 'required',
            'gsize' => 'required',
        ],[
            'type1.required'=>'！！请选一个类别！！',
            'gname.required'=>'！！请填写商品名！！',
            'price.required'=>'！！请填写商品标价！！',
            'stock.required'=>'！！请填写商品库存！！',
            'gcolor.required'=>'！！请选择至少一种颜色！！',
            'gsize.required'=>'！！请填写商品大小型号！！',
        ]);
        $good = $request -> only('company','gname','price','stock','gpic','descript','');
        if (array_key_exists('type3',$request->post()) && !empty($request->type3)) {
            $tid = $request -> type3;
        } else {
            if (array_key_exists('type2',$request->post()) && !empty($request->type2)) {
                $tid = $request -> type2;
            } else {
                 if (array_key_exists('type1',$request->post() && !empty($request->type1))) {
                    $tid = $request -> type1;
                } else {
                    return back()->with('error','选一个类别');
                }
            }
        }
        $good['tid'] = $tid;
        $file = $request -> file('gpic');
         //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            $path = $file->move('./uploads/goods/',$newName);


            $filepath = '/uploads/goods/'.$newName;


            $good['gpic'] = $filepath;
            $good['inputtime'] = date('Y-m-d H:i:s',time());

            // dd($good,$request->post(),$tid);

            $gid = DB::table('goods')->insertGetId($good);
            //返回文件的路径
        }
        // 判断数据是否加入到商品表
        if (!$gid) {
            return back()->with('error','商品添加失败,请检查商品名,标价,库存,上架图片是否填写正确');
        }

        $gcolor = $request->gcolor;
        $gc = [];
        // 数组重构
        for ($i=0; $i <count($gcolor) ; $i++) {
            $gc[$i]['gid'] = $gid;
            $gc[$i]['color'] = $gcolor[$i];
        }
        $rgc = DB::table('gcolor')->insert($gc);
        // 判断数据是否加入到颜色表
        if (!$rgc) {
            return back()->with('error','商品添加失败,请检查商品颜色选择');
        }

        $gsize = $request->gsize;
        $gs = [];
        // 构建数组
        $gsize = explode(',',$gsize);
        // 数组重构
        for ($i=0; $i <count($gsize) ; $i++) {
            $gs[$i]['gid'] = $gid;
            $gs[$i]['size'] = $gsize[$i];
        }
        $rgs = DB::table('gsize')->insert($gs);
        // 判断数据是否加入到大小尺寸表
        if ($rgs) {
            return redirect('/home/myStroeInfo/'.$request->company)->with('success','商品添加成功!');
        } else {
            return back()->with('error','商品添加失败');
        }
    }

    public function goodinfo($gid)
    {
        $good = DB::table('goods')->where('gid',$gid)->first();
        $gcolor = DB::table('gcolor')->where('gid',$gid)->get();
        $gsize = DB::table('gsize')->where('gid',$gid)->get();
        // dd($good,$gcolor,$gsize);
        return view('home.ljq.myGoodInfo',['title'=>'店铺商品详情','good'=>$good,'gcolor'=>$gcolor,'gsize'=>$gsize]);
    }

    public function goodcolor(Request $request)
    {
        $id = $request -> id;
        $sid = $request -> sid;
        $file = $request -> file;
        // dd($res);
        foreach ($sid as $v) {
            $sizeid[] = implode(',',$v);
        }
        foreach ($id as $k=>$v)
        {
            $img = $file[$k];
            //判断文件是否有效
            if($img->isValid()){
                //上传文件的后缀名
                $entension = $img->getClientOriginalExtension();
                //修改名字
                $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
                //移动文件
                $path = $img->move('./uploads/goods/',$newName);

                $filepath = '/uploads/goods/'.$newName;

            }
            // 修改数据res
            $arr = ['sid'=>$sizeid[$k],'pictrue'=>$filepath];
            $res = DB::table('gcolor')->where('id',$v)->update($arr);
            if (!$res) {
                return back()->with('error','数据修改失败');
            }
        }
        // dd($sid);
        return back()->with('error','数据修改成功');
    }

    public function goodsize(Request $request)
    {
        $cid = $request -> colorid;
        $id = $request -> id;
        $price = $request -> price;
        $colorid = [];
        foreach ($cid as $v) {
            $colorid[] = implode(',',$v);
        }
        foreach ($id as $k=>$v) {
            $arr = ['colorid'=>$colorid[$k],'price'=>$price[$k]];
            $res = DB::table('gsize')->where('id',$v)->update($arr);
            if (!$res) {
                return back()->with('error','数据修改失败');
            }
        }
        return back()->with('error','数据修改成功');
    }

    public function goodup(Request $request,$gid)
    {
        $arr = $request -> except('_token');
        $res = DB::table('goods')->where('gid',$gid)->update($arr);
        if ($res) {
            return redirect('/home/goodinfo/'.$gid)->with('error','修改成功');
        }
    }
}
