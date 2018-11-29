<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Site;

class SiteController extends Controller
{
    //
    /**
     *  Display a listing of the resource.
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
}
