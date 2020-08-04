<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalPembelian extends Model
{
    public function pemesanan()
    {
        return $this->belongsTo(Pembelian::class, 'pemesanan_id');
    }
}
