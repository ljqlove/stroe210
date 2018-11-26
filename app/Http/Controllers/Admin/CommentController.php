<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Comment;
use DB;
use App\Model\Admin\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$ucomm= DB::table('users')->get();
    	$comment=DB::table('comment')->paginate(5);
        return view('admin.comment.index',[
            'title'=>'评价列表',
            'comment'=>$comment,
            'ucomm'=>$ucomm
        ]);
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $res = User::destroy($id);
            
            if($res){
                return redirect('/admin/comment')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
