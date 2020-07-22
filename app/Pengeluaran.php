<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengeluaran extends Model
{
    protected $table = 'pengeluarans';
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_parfum');
    }
    public function penjualan()
    {
        return $this->belongsTo('App\Penjualan', 'penjualan_id');
    }
    // public function total_penjualan()
    // {
    //     $purchases = DB::table('transactions')
    //         ->join('categories', 'transactions.category_id', '=', 'categories.id')
    //         ->where('categories.kind', '=', 1)
    //         ->sum('transactions.amount');
    // }
}
