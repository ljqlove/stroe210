<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $primaryKey = 'id';

    public function stroes()
    {
        return $this->belongsToMany('App\Model\Admin\User','collect','uid','sid');
    }
}
