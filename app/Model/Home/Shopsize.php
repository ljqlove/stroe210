<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Shopsize extends Model
{
    protected $table = 'shopsize';

    protected $primaryKey = 'id';

    public function desg()
    {
        return $this -> hasMany('App\Model\Admin\Goods');
    }
}
