<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanParfum extends Model
{
    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
}
