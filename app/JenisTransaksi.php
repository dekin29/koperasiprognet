<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisTransaksi extends Model
{
    protected $table = 'tb_jenis_transaksi';
    protected $primarykey = 'id';

    public $timestamps = false;

}
