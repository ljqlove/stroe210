<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanFollow;

class User extends Model
{
    // 收藏 关联
    use CanFollow;
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'comment';

    protected $primaryKey = 'cid';

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
     * 用户正向关联用户信息。
     */
    public function comment()
    {
        return $this->hasOne('App\Comment');
    }
}
