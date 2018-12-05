<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Flash extends Model
{
    protected $table = 'shopflash';

    protected $primaryKey = 'id';

    public $timestamps = false;

	protected $guarded = [];
}
