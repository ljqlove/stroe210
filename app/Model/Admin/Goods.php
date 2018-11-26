<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $table = 'goods';

    protected $primaryKey = 'gid';

    public $timestamps = false;

	protected $guarded = [];

	 public function gis()
    {
        return $this->hasMany('App\Model\Admin\Goodsimg','gid');
    }
}
