<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddressController extends Controller
{
    //
    /**
     *  地址主页
     *
     *  @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// dd(1);
   		return view('home/wjd/address',[
   			'title'=>'我的地址管理']);
    }


    /**
     *  设置默认地址
     *
     *  @return \Illuminate\Http\Response
     */
    public function dostatus(Request $request)
    {
    	$id = $request->id;
    	// 获取状态为1的地址
    	$status = DB::table('address')->where('status','1')->first();
    	if ($status) {
	    	// 取消原来的默认地址的字段
	    	$aid = $status->aid;
			DB::update('update address set status="0" where aid=?',[$aid]);
    	}
    	// 查询出要将要设为默认地址的
    	$res = DB::table('address')->where('aid',$id)->first();
    	
    	DB::update('update address set status="1" where aid=?',[$id]);
    	return view('home/wjd/address',[
    		'title'=>'我的地址管理'
    	]);

    }
    /**
     *  显示修改的数据
     *
     *  @return \Illuminate\Http\Response
     */
    
    	

    public function ajaxedit()
    {
    	$aid = strip_tags($_POST['aid']);
    	$info = DB::table('address')->where('aid',$aid)->first();
    	if($info){
    		$a['list'] = $info;
	    	$a['status'] = 1;
	    	echo json_encode($a);
    	} else {
    		$a['list'] = '获取失败';
	    	$a['status'] = 2;
	    	echo json_encode($a);
    	}
    }

    /**
     *  进行地址的修改操作
     *
     *  @return \Illuminate\Http\Response
     */
    
    	
    public function ajaxupdate()
    {
    	$aid = strip_tags($_POST['aid']);
    	$map['aname'] = strip_tags($_POST['consigneeName']);
    	$map['address'] = strip_tags($_POST['consigneeAddress']);
    	$map['aphone'] = strip_tags($_POST['consigneeMobile']);
    	$map['postcode'] = strip_tags($_POST['consigneeEmail']);
    	$result = DB::table('address')->where('aid', $aid)->update($map);
    	if($result){
	    	$a['status'] = 1;
	    	echo json_encode($a);
    	} else {
	    	$a['status'] = 2;
	    	echo json_encode($a);
    	}
    }
    /**
     *  地址添加
     *
     *  @return \Illuminate\Http\Response
     */
    
    	

    public function ajaxadd()
    {
    	$map['aname'] = strip_tags($_POST['aname']);
    	$map['address'] = strip_tags($_POST['address']);
    	$map['aphone'] = strip_tags($_POST['aphone']);
    	$map['postcode'] = strip_tags($_POST['postcode']);
    	$map['inputtime'] = date('Y-m-d H:i:s',time());
    	$map['uid'] = session('userinfo')['uid'];
    	$result = DB::table('address')->insert($map);
    	if($result){
	    	$a['status'] = 1;
	    	echo json_encode($a);
    	} else {
	    	$a['status'] = 2;
	    	echo json_encode($a);
    	}
    }

    /**
     *  进行地址的删除操作
     *
     *  @return \Illuminate\Http\Response
     */
    
    	
    public function ajaxdeletes()
    {
    	$did = strip_tags($_POST['did']);
    	$result = DB::table('address')->where('aid', '=', $did)->delete();
    	if($result){
	    	$a['status'] = 1;
	    	echo json_encode($a);
    	} else {
	    	$a['status'] = 2;
	    	echo json_encode($a);
    	}
    }

}
