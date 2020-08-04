<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan');
    }
}
