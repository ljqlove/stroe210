<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Message;
use App\Model\Admin\Comment;

class MessageController extends Controller
{
    /**
     * 客户的详情页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 条件搜索  分页
        $user = DB::table('users')->get();
        $message = Message::orderBy('mid','asc')
                ->where(function($query) use($request){
            $rs = $request->input('uname');
            if(!empty($rs)) {
                $query->where('uname','like','%'.$rs.'%');
            }
        })->paginate(5);
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
    public function edit($mid)
    {
          // dd($fid);
        $res = Message::find($mid);
        $user = DB::table('users')->get();
        // dd($user);
        // dd($res);

        return view('admin.message.edit',[
            'title'=>'客户的信息修改界面',
            'res'=>$res,
            'user'=>$user
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
        // dd($id);
        $res = $request->except('_token','_method');
        // dd($res);

        if($request->hasFile('headpic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('headpic')->getClientOriginalExtension();

            $request->file('headpic')->move('./images/message/uploads',$name.'.'.$suffix);

            $res['headpic'] = '/images/message/uploads/'.$name.'.'.$suffix;

        }
        try{

            Message::where('mid', $id)->update($res);

            return redirect('/admin/message')->with('success','修改成功');
        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }

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
        // echo "此功能还没完善";
        $message = DB::select("select * from message where mid = '$id'");

        $res = Message::where('mid',$id)->get();
        // dd($res);
        // 关联删除 users表
        $users = []; //定义一个空数组
        foreach ($res as $v){
            $user = $v->uid;
            $users[] = $user;
            // $use = Comment::where('uid',$users)->get();
            // dd($users);
            $comment = Comment::destroy($users);

        }
        
    

        try {

            $message = Message::destroy($id);
            if ($message && $comment) {
                return redirect('/admin/firend')->with('success','删除成功');
            }
        } catch (\Exception $e) {
            return back()->with('error','删除失败');
        }
    }
}
