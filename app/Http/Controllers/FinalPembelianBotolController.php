<?php

namespace App\Http\Controllers;

use App\Botol;
use App\FinalPembelianBotol;
use App\PembelianBotol;
use Illuminate\Http\Request;
use PDF;

class FinalPembelianBotolController extends Controller
{
    public function cetak()
    {
        $final_pembelian = FinalPembelianBotol::all();

        $pdf = PDF::loadview('laporan_pembelian_fix_botol', compact('final_pembelian'));
        return $pdf->download('laporan_pembelian_fix_botol');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $final_pembelian =  FinalPembelianBotol::all();
        return view('final_pembelian_botol.index', compact('final_pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemesanan = PembelianBotol::where('status', 'Proses Pembelian')->get();
        return view('final_pembelian_botol.add', compact('pemesanan'));
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
            'pemesanan_id' => 'required',
            'keterangan' => 'nullable',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);
        $pembelian = new FinalPembelianBotol;

        $id = $request->pemesanan_id;
        $id_explode = explode('|', $id);

        $pembelian->pemesanan_id = $id_explode[0];
        $pembelian->keterangan = $request->keterangan;
        $pembelian->harga = $request->harga;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->save();

        $pemesanan = PembelianBotol::findOrFail($id_explode[0]);
        $pemesanan->status = "Diterima Gudang";
        $pemesanan->save();

        $barang = Botol::findOrFail($id_explode[1]);
        $barang->jumlah_botol += $request->jumlah;
        $barang->save();

        // return $request;
        return redirect('final_pembelian_botol')->with('status', 'Pembelian berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
