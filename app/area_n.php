<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area_n extends Model
{
    protected $connection = 'pgsql2';
    protected $table = 'queue';
    protected $fillables = ['id','name','grupo_id'];

}
