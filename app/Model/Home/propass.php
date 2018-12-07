<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class propass extends Model
{
    protected $table = 'propass';

    protected $primaryKey = 'id';

    public $timestamps = false;

	protected $guarded = [];

}
