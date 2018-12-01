<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Gsize extends Model
{
    protected $table = 'shopsize';

    protected $primaryKey = 'id';

    public $timestamps = false;

	protected $guarded = [];
}
