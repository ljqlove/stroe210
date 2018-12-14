<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Blog_permissions;



class Blog_permissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // 条件搜索  分页
        $permissions = Blog_permissions::orderBy('id','asc')
                ->where(function($query) use($request){
            $rs = $request->input('description');
            if(!empty($rs)) {
                $query->where('description','like','%'.$rs.'%');
            }
        })->paginate(10);
        // dd($permissions);
        return view('admin.blog_permissions.index',[
            'title'=>'权限详情界面',
            'permissions'=>$permissions,
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
        return view('admin.blog_permissions.add',['title'=>'添加权限']);

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
            'description' => 'required',
            'name' => 'required',
        ],[
            'description.required'  => '权限描述不能为空',
            'description.regex'  => '权限描述格式不正确',
            'name.required' => '权限路由不能为空',
            'name.regex'=>'权限路由格式不正确',
        ]);


        //
        $res = $request->except('_token');
        // dd($res);

        //往数据表里面添加数据
        $res['created_at'] = date('Y-m-d H:i:s',time());

        $data = Blog_permissions::create($res);

        if ($data) {
            return redirect('/admin/blog_permissions')->with('success','添加成功');
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
        $res = Blog_permissions::find($id);
        // dd($res);

        return view('admin.blog_permissions.edit',[
            'title'=>'权限修改页面',
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

            $data = Blog_permissions::where('id', $id)->update($res);
            // dd($data);
            if($data){
                return redirect('/admin/blog_permissions')->with('success','修改成功');
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
        try {
            $res = Blog_permissions::destroy($id);
            if ($res) {
                return redirect('/admin/blog_permissions')->with('success','删除成功');
            }
        } catch (\Exception $e) {
            return back()->with('error','删除失败');
        }
    }
}
