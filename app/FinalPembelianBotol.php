<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalPembelianBotol extends Model
{
    public function pemesanan()
    {
        return $this->belongsTo(PembelianBotol::class, 'pemesanan_id');
    }
}
