<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Gcolor extends Model
{
     protected $table = 'gcolor';

    protected $primaryKey = 'id';

    public $timestamps = false;

	protected $guarded = [];
}
