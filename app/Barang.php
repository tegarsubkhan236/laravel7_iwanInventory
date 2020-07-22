<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';

    // public function pembelian()
    // {
    //     return $this->hasOne(Pembelian::class, 'id_barang');
    // }

    // $data->harga_pembelian = array_merge($data->specifics, $this->request->get('specifics'));
}
