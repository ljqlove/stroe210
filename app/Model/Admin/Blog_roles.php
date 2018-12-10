<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog_roles extends Model
{
    //
 	/**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'blog_roles';

    protected $primaryKey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];

    /**
     * 获得此角色的权限。
     */
    public function pers()
    {
        return $this->belongsToMany('App\Model\Admin\Blog_permissions','blog_permission_role','role_id','permission_id');
    }

}
