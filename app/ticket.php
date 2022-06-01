<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
   protected $connection = 'pgsql2';
   protected $table = 'ticket';
   protected $fillables = [
    'tn','title','queue_id'
   ];
}
