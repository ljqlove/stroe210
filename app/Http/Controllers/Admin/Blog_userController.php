<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Blog_user;
use App\Model\Admin\Blog_roles;
use Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class Blog_userController extends Controller
{
    /**
     *  用户添加角色的界面
     *
     *  @return \Illuminate\Http\Response
     */
    public function user_role(Request $request)
    {
        // 根据id查询用户
        $id = $request->id;
        // dd($id);
        $res = Blog_user::find($id);
        // dd($res->roles);
        $info = [];
        foreach($res->roles as $k=>$v){
            $info[] = $v->id;
        }

        // dd($info);

        // 查询所有的角色
        $roles = Blog_roles::all();

        return view('admin.blog_user.user_role',[
            'title'=>'用户添加角色的界面',
            'res'=>$res,
            'roles'=>$roles,
            'info'=>$info
        ]);
    }
        

    /**
     *  用来处理用户添加角色过来的数据
     *
     *  @return \Illuminate\Http\Response
     */
    public function do_user_role(Request $request)
    {
        $id = $request->id;
        // dd($id);

        $res = $request->role_id;
        // dd($res);

        // 删除原来的角色
        DB::table('blog_role_user')->where('user_id',$id)->delete();

        $arr = [];
        foreach($res as $K =>$v){
            $rs = [];
            $rs['user_id'] = $id;
            $rs['role_id'] = $v;
            $arr[] = $rs;
        }
        // dd($arr);
        // 向用户角色关联表里面插入数据
        $data = DB::table('blog_role_user')->insert($arr);
        if ($data) {
            return redirect('/admin/blog_user')->with('success','更改成功');
        }
    }
    
        

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $role = DB::select('select * from blog_user order by user_id DESC limit 1');
        $roles = [];
        foreach($role as $k=>$v){
            $roles['user_id'] = ($v->user_id);
        }
        // dd($roles);
        $data = DB::table('blog_role_user')->insert($roles);
        // 以上是为了给新添加的管理员赋予一个默认的角色


        // 条件搜索  分页
        $user = Blog_user::orderBy('user_id','asc')
                ->where(function($query) use($request){
            $rs = $request->input('user_name');
            if(!empty($rs)) {
                $query->where('user_name','like','%'.$rs.'%');
            }
        })->paginate(5);
        return view('admin.blog_user.index',[
            'title'=>'角色详情界面',
            'user'=>$user,
            'request'=>$request
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog_user.add',['title'=>'添加管理员']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'user_name' => 'required|regex:/^\w{3,16}$/',
            'user_pass' => 'required|regex:/^\S{3,12}$/',
            'password'=>'same:user_pass',
        ],[
            'user_name.required' => '用户名不能为空',
            'user_name.regex'=>'用户名格式不正确',
            'user_pass.required'  => '密码不能为空',
            'user_pass.regex'  => '密码格式不正确',
            'password.same'=>'两次密码不一致',
        ]);


        //
        $res = $request->except('_token','password');
        // dd($res);

        //往数据表里面添加数据
        $res['user_pass'] = Hash::make($request->user_pass);
        $res['created_at'] = date('Y-m-d H:i:s',time());


        $data = Blog_user::create($res);

        if ($data) {
            return redirect('/admin/blog_user')->with('success','添加成功');
        }
            return back()->with('error','添加失败');
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
        // echo 1;die;
        $res = Blog_user::find($id);
        // dd($res);

        return view('admin.blog_user.edit',[
            'title'=>'角色修改页面',
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

        $res = $request->except('_token','_method');
        // dd($res);
        $res['updated_at'] = date('Y-m-d H:i:s',time());

        dd($res);
        if($request->hasFile('user_pic') && $request->file('user_pic')->isValid()){
            
            $photo = $request->file('user_pic');
            //自定义名字
            $file_name = uniqid().'.'.$photo->getClientOriginalExtension();
            
            $file_path =public_path('images/blog_user/uploads');
            $thumbnail_file_path = $file_path . '/blog_user-'.$file_name;

            $image = Image::make($photo)->resize(200, 200)->save($thumbnail_file_path);

            $res['user_pic'] = '/images/blog_user/uploads/'.$image->basename;
            // dd($res['user_pic']);
        }
        try{
            $data = Blog_user::where('user_id', $id)->update($res);
            // dd($data);
            if($data){
                return redirect('/admin/blog_user')->with('success','修改成功');
            }

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
        // dd($id);
        try {
            $res = Blog_user::destroy($id);
            if ($res) {
                return redirect('/admin/blog_user')->with('success','删除成功');
            }
        } catch (\Exception $e) {
            return back()->with('error','删除失败');
        }
    }
}
