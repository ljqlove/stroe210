<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Advert;
use DB;
use Image;
class AdvertController extends Controller
{  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo '广告设置';
        // $advert = Advert::select();
        $advert = DB::select('select * from advert');

        // dd($advert);
        
        return view('admin.advert.index',[
            'title'=>'广告页面',
            'advert'=>$advert,
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
        // echo '修改广告页面';
        $advert = Advert::where('id',$id)->get();

        // dd($advert);
        return view('admin.advert.edit',[
            'title'=>'广告修改',
            'advert'=>$advert,
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
    { $res = $request->except('_token','_method');
        
        // 图片修改

          if($request->hasFile('img') && $request->file('img')->isValid()){

            $photo = $request->file('img');
            //自定义名字
            $file_name = uniqid().'.'.$photo->getClientOriginalExtension();


            $file_path =public_path('advert/');
            $thumbnail_file_path = $file_path . '/friend-'.$file_name;


            $image = Image::make($photo)->resize(500, 500)->save($thumbnail_file_path);


            $res['img'] = '/advert/'.$image->basename;


        }

        $adv = Advert::where('id',$id)->update($res);

        if ($adv) {
            return redirect('/admin/advert')->with('success','修改成功');
        }
        return redirect('/admin/advert')->with('success','修改成功');
        // dd($res);
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
