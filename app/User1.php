<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User1 extends Model
{
    protected $table = 'tb_users';
    protected $primarykey = 'id';

    public $timestamps = false;
}
