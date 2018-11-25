<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Message;
use App\Model\Admin\Users;

class MessageController extends Controller
{
    /**
     * 客户的详情页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // echo 1;die;
        // 条件搜索  分页
        $user = DB::table('users')->get();
        // dd($user);
        $message = Message::orderBy('mid','asc')
                ->where(function($query) use($request){
            $rs = $request->input('uname');
            if(!empty($rs)) {
                $query->where('uname','like','%'.$rs.'%');
            }
        })->paginate(10);
        // dd($message);
        return view('admin.message.index',[
            'title'=>'客户的信息界面',
            'message'=>$message,
            'request'=>$request,
            'user'=>$user
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
        // echo 1;die;
        // return view('admin.message.add',['title'=>'添加客人信息']);

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
