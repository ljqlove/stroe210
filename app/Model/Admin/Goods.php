<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Goods extends Model
{
    // 被收藏 关联
    use CanBeFollowed;

    protected $table = 'goods';

    protected $primaryKey = 'gid';

    public $timestamps = false;

	protected $guarded = [];

	 public function gis()
    {
        return $this->hasMany('App\Model\Admin\Goodsimg','gid');
    }
}
