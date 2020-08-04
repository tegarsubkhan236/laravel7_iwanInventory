<?php

namespace App\Http\Controllers;

use App\Botol;
use App\PembelianBotol;
use App\Supplier;
use Illuminate\Http\Request;
use PDF;

class PembelianBotolController extends Controller
{
    public function cetak()
    {
        $pembelian = PembelianBotol::all();
        $botol = Botol::all();
        $supplier = Supplier::all();
        $total = PembelianBotol::where('status', 'Diterima')->sum('total_pembelian');

        $pdf = PDF::loadview('laporan_pembelian_botol', compact('pembelian', 'supplier', 'botol', 'total'));
        return $pdf->download('laporan_pembelian_botol');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian = PembelianBotol::all();
        $botol = Botol::all();
        $supplier = Supplier::all();
        $total = PembelianBotol::where('status', 'Diterima')->sum('total_pembelian');
        return view('botol.pembelian.index', compact('pembelian', 'botol', 'supplier', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        $botol = Botol::all();
        return view('botol.pembelian.add', compact('supplier', 'botol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jumlah' => 'required',
            'harga' => 'required',
        ]);
        $pembelian = new PembelianBotol();

        $supp = $request->supplier_id;
        $supp_explode = explode('|', $supp);

        $pembelian->supplier_id = $supp_explode[0];
        $pembelian->harga = $request->harga;
        $pembelian->botol_id = $request->botol_id;
        $pembelian->total_pembelian = 0;
        $pembelian->status = "Menunggu Acc Owner";

        if ($request->jumlah >= $supp_explode[1]) {
            $pembelian->jumlah = $request->jumlah;
        } else {
            return "Pemesanan tidak memenuhi Syarat minimal pemesanan dari supplier";
        }
        $pembelian->save();

        return redirect('pembelian_botol')->with('status', 'Pengajuan pemesanan Botol berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemesanan = PembelianBotol::find($id);
        // return view('penjualan.update', ['penjualan' => $penjualan]);

        $pdf = PDF::loadview('nota_pemesanan_botol', compact('pemesanan'))->setPaper('a4', 'landscape');
        return $pdf->download('nota_pemesanan_botol');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembelian = PembelianBotol::find($id);
        return view('botol.pembelian.update', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pembelian = PembelianBotol::find($id);

        if ($request->status == "Menunggu Acc Owner") {
            $validateData = $request->validate([
                'min_botol' => 'required|numeric',
                'jumlah' => 'required|numeric|lebih_dari:min_botol',
                'harga' => 'required',
            ]);

            $pembelian->botol_id = $request->botol_id;
            $pembelian->harga = $request->harga;
            $pembelian->jumlah = $request->jumlah;
        }

        $pembelian->status = $request->status;
        $pembelian->save();
        return redirect('pembelian_botol')->with('status', 'Data pembelian berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = PembelianBotol::find($id);
        $pembelian->delete($pembelian);
        return redirect('pembelian_botol')->with('status', 'Data pembelian berhasil di Delete!');
    }
}
