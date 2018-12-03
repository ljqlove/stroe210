<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Site;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;


class SiteController extends Controller
{
    //
    /**
     *  站点修改
     *
     *  @return \Illuminate\Http\Response
     */
	public function edit()
	{
		$res = Site::find(1);
		// dd($res);
		return view('admin.site.edit',[
			'title'=>'站点设置界面',
			'res'=>$res
		]);
	}

	/**
	 *  接收站点传过来的值
	 *
	 *  @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		// dd(1);
		$id = $request ->id;
        $this->validate($request, [
            'title' => 'required',
            'keywords' => 'required',
            'description'=>'required',
            'copyright'=>'required',
            'statue'=>'required',
        ],[
            'title.required' => '网站标题不能为空',
            'keywords.required'  => '关键词不能为空',
            'description.required'=>'网站描述不能为空',
            'copyright.required'=>'网站版权不能为空',
            'statue.required'=>'网站状态更改失败',
        ]);
        $res = $request->except('_token','_method');
        // $res = $request->all();
        // dd($res);
           

		if($request->hasFile('LOGO') && $request->file('LOGO')->isValid()){

		$photo = $request->file('LOGO');
		//自定义名字
		$file_name = uniqid().'.'.$photo->getClientOriginalExtension();

		$file_path =public_path('images/site/uploads');
		$thumbnail_file_path = $file_path . '/site-'.$file_name;

		$image = Image::make($photo)->resize(200, 90)->save($thumbnail_file_path);

		$res['LOGO'] = '/images/site/uploads/'.$image->basename;
		// dd($res['LOGO']);

        }
        try{

            $data = Site::where('id', $id)->update($res);
            // dd($data);
            if($data){
                return redirect('/admin/site')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }

	}
}
