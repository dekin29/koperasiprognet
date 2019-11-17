<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
   	protected $table = 'tb_anggota';
   	protected $primaryKey = "id";
   	public $timestamps = false;
	protected $fillable = ['no_anggota','nama','alamat','telepon','noktp','kelamin_id','status_aktif','user_id'];
  	protected $guarded = [];
}
