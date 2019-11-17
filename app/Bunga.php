<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bunga extends Model
{
    protected $table = 'tb_trx_perhitungan_bunga_simpanan';
   	protected $primaryKey = "id";
   	public $timestamps = false;
	protected $fillable = ['trx_bulan','trx_tahun','tanggal_proses','persentase_bunga','id_user'];
  	protected $guarded = [];
}
