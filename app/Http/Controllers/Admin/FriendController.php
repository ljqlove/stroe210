<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Firend;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

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
        $this->validate($request, [
            'fname' => 'required',
            'url' => 'required',
            'fpic'=>'required'
        ],[
            'fname.required' => '链接名称不能为空',
            'url.required'  => '地址不能为空',
            'fpic.required'=>'请上传图片'
        ]);
        $res = $request->except('_token');
        $time = time();
        $res['inputtime'] = ($time=(date('Y-m-d H:i:s')));
        // dd($_FILES["fpic"]);
        if ($_FILES["fpic"]['type'] == "image/jpeg" || $_FILES["fpic"]['type'] == "image/png" ||  $_FILES["fpic"]['type'] == "image/gif" || $_FILES["fpic"]["size"] < 2000000){
            if($request->hasFile('fpic') && $request->file('fpic')->isValid()){
                
                $photo = $request->file('fpic');
                //自定义名字
                $file_name = uniqid().'.'.$photo->getClientOriginalExtension();

                $file_path =public_path('images/friends/uploads');
                $thumbnail_file_path = $file_path . '/friend-'.$file_name;

                $image = Image::make($photo)->resize(80, 80)->save($thumbnail_file_path);

                $res['fpic'] = '/images/friends/uploads/'.$image->basename;

            }
        }else{
            return back()->with('errores','图片类型不符合只支持上传"jpg"或"png"或"gif"');
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

        if ($_FILES["fpic"]['type'] == "image/jpeg" || $_FILES["fpic"]['type'] == "image/png" ||  $_FILES["fpic"]['type'] == "image/gif" || $_FILES["fpic"]["size"] < 2000000){
            if($request->hasFile('fpic') && $request->file('fpic')->isValid()){
                
                $photo = $request->file('fpic');
                //自定义名字
                $file_name = uniqid().'.'.$photo->getClientOriginalExtension();
                
                $file_path =public_path('images/friends/uploads');
                $thumbnail_file_path = $file_path . '/friends-'.$file_name;

                $image = Image::make($photo)->resize(80, 80)->save($thumbnail_file_path);

                $res['fpic'] = '/images/friends/uploads/'.$image->basename;

            }
        }else{
            return back()->with('errores','图片类型不符合只支持上传"jpg"或"png"或"gif"');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
