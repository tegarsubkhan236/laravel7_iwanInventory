<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
	protected $table = 'penjualan';
	protected $fillable = ['id', 'no_trans_penjualan', 'tgl_trans_penjualan'];
	protected $primaryKey = 'id';


	public function barang()
	{
		return $this->belongsTo('App\Barang');
	}

	public function botol()
	{
		return $this->belongsTo('App\Botol');
	}
}
