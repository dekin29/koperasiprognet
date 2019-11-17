<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    protected $table = 'tb_simpanan';
   	protected $primaryKey = "id";
   	public $timestamps = false;
	protected $fillable = ['anggota_id','tanggal','jenis_transaksi','nominal_transaksi','id_user'];
  	protected $guarded = [];
  	public function tambahSimpanan(){
    	return $this->belongsTo('App\JenisTransaksi', 'jenis_transaksi', 'id');
    }
}
