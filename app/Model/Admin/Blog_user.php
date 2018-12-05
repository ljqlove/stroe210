<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog_user extends Model
{
    //
	/**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'blog_user';

    protected $primaryKey = 'user_id';

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
     * 获得此用户的角色。
     */
    public function roles()
    {
        return $this->belongsToMany('App\Model\Admin\Blog_roles','blog_role_user','user_id', 'role_id');
    }

}
