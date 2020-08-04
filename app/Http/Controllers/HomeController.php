<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\PembelianBotol;
use App\Pengiriman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //pemesanan parfum
        $parfum_menunggu = Pembelian::all()->where('status', 'Menunggu Acc Owner')->count();
        $parfum_acc = Pembelian::all()->where('status', 'Acc Owner')->count();
        $parfum_process = Pembelian::all()->where('status', 'Proses Pembelian')->count();
        $parfum_diterima = Pembelian::all()->where('status', 'Diterima Gudang')->count();

        $botol_menunggu = PembelianBotol::all()->where('status', 'Menunggu Acc Owner')->count();
        $botol_acc = PembelianBotol::all()->where('status', 'Acc Owner')->count();
        $botol_process = PembelianBotol::all()->where('status', 'Proses Pembelian')->count();
        $botol_diterima = PembelianBotol::all()->where('status', 'Diterima Gudang')->count();

        $pengiriman_menunggu = Pengiriman::all()->where('status', 'Menunggu Acc Owner')->count();
        $pengiriman_acc = Pengiriman::all()->where('status', 'Acc Owner')->count();
        $pengiriman_process = Pengiriman::all()->where('status', 'Proses Pengiriman')->count();
        $pengiriman_diterima = Pengiriman::all()->where('status', 'Diterima ReSeller')->count();

        return view('dashboard', compact(
            'parfum_menunggu',
            'parfum_acc',
            'parfum_process',
            'parfum_diterima',
            'botol_menunggu',
            'botol_acc',
            'botol_process',
            'botol_diterima',
            'pengiriman_menunggu',
            'pengiriman_acc',
            'pengiriman_process',
            'pengiriman_diterima',
        ));
    }
}
