<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Gsize extends Model
{
    protected $table = 'gsize';

    protected $primaryKey = 'id';

    public $timestamps = false;

	protected $guarded = [];
}
