<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Flash;
use DB;

class FlashController extends Controller
{
   	public function index(Request $request)
   	{
   		$flash = Flash::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $fname = $request->input('fname');
               
                //如果用户名不为空
                if(!empty($fname)) {
                    $query->where('fname','like','%'.$fname.'%');
                }
              
            })
        ->paginate(10);
        
   		return view('home.flash',[
   			'title'=>'快讯列表',
   			'flash'=>$flash,
   			'request'=>$request
   		]);
   	}

   	public function content(Request $request , $id)
   	{
   		// dd($id);
   		$flash = Flash::where('id',$id)->get();

   		// dd($flash);
   		return view('home.content',[
   			'title'=>'快讯详情页',
   			'flash'=>$flash
   		]);
   	}
}
