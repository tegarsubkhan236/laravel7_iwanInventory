<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianBotol extends Model
{
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function botol()
    {
        return $this->belongsTo('App\Botol');
    }
}
