<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Blog_roles;
use App\Model\Admin\Blog_permissions;
use DB;


class Blog_rolesController extends Controller
{
    /**
     *  角色添加权限名
     *
     *  @return \Illuminate\Http\Response
     */
    public function role_per(Request $request)
    {
        //获取角色名
        $id = $request->id;
        // dd($id);
        $res = Blog_roles::find($id);
        // dd($res->pers);
        $info = [];
        foreach ($res->pers as $k => $v) {
            $info[] = $v->id;
        }

        //把所有的权限路径查询出来
        $per = Blog_permissions::all();
        // dd($info);

        return view('admin.blog_roles.role_per',[
            'title'=>'角色添加权限的页面',
            'res'=>$res,
            'per'=>$per,
            'info'=>$info
        ]);
    }

    /**
     *  处理角色权限的方法
     *
     *  @return \Illuminate\Http\Response
     */
    public function do_role_per(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'per_id' => 'required'
        ],[
            'id.required' => '角色不能为空',
            'id.regex'=>'角色格式不正确',
            'per_id.required'  => '权限不能为空',
            'per_id.regex'  => '权限格式不正确',
        ]);
        //角色id
        $id = $request->id;
        // dd($id);
        // 权限路径id
        $per_id = $request->per_id;
        // dd($per_id);

        DB::table('blog_permission_role')->where('role_id',$id)->delete();



        $pers = [];
        foreach($per_id as $k => $v){
            $rs = [];
            $rs['role_id'] = $id;
            $rs['permission_id'] = $v;
            $pers[] = $rs;
        }

        //插入数据
        $data = DB::table('blog_permission_role')->insert($pers);
        // dd($data);
        if ($data) {
            return redirect('admin/blog_roles')->with('success','更改成功');
        }
            return back()->with('error',"更改失败");


    }
    
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // 条件搜索  分页
        $roles = Blog_roles::orderBy('id','asc')
                ->where(function($query) use($request){
            $rs = $request->input('name');
            if(!empty($rs)) {
                $query->where('name','like','%'.$rs.'%');
            }
        })->paginate(10);
        // dd($roles);
        return view('admin.blog_roles.index',[
            'title'=>'角色详情界面',
            'roles'=>$roles,
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
        return view('admin.blog_roles.add',['title'=>'添加角色']);

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
        // dd(1);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ],[
            'name.required' => '角色名不能为空',
            'name.regex'=>'角色名格式不正确',
            'description.required'  => '描述不能为空',
            'description.regex'  => '描述格式不正确',
        ]);


        //
        $res = $request->except('_token');
        // dd($res);

        //往数据表里面添加数据
        $res['created_at'] = date('Y-m-d H:i:s',time());


        $data = Blog_roles::create($res);

        if ($data) {
            return redirect('/admin/blog_roles')->with('success','添加成功');
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
        $res = Blog_roles::find($id);
        // dd($res);

        return view('admin.blog_roles.edit',[
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
         $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ],[
            'name.required' => '角色名不能为空',
            'name.regex'=>'角色名格式不正确',
            'description.required'  => '描述不能为空',
            'description.regex'  => '描述格式不正确',
        ]);


        $res = $request->except('_token','_method');
        // dd($res);
        $res['updated_at'] = date('Y-m-d H:i:s',time());

        try{

            $data = Blog_roles::where('id', $id)->update($res);
            // dd($data);
            if($data){
                return redirect('/admin/blog_roles')->with('success','修改成功');
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
        // echo 1;die;
        try {
            $res = Blog_roles::destroy($id);
            if ($res) {
                return redirect('/admin/blog_roles')->with('success','删除成功');
            }
        } catch (\Exception $e) {
            return back()->with('error','删除失败');
        }
    }
}
