<?php

namespace App\Http\Controllers;

use App\Barang;
use App\FinalPembelian;
use App\Pembelian;
use Illuminate\Http\Request;
use PDF;

class FinalPembelianController extends Controller
{
    public function cetak()
    {
        $final_pembelian = FinalPembelian::all();

        $pdf = PDF::loadview('laporan_pembelian_fix_parfum', compact('final_pembelian'));
        return $pdf->download('laporan_pembelian_fix_parfum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $final_pembelian =  FinalPembelian::all();
        return view('final_pembelian.index', compact('final_pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemesanan = Pembelian::where('status', 'Proses Pembelian')->get();
        return view('final_pembelian.add', compact('pemesanan'));
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
        ]);
        $pembelian = new FinalPembelian;

        $id = $request->pemesanan_id;
        $id_explode = explode('|', $id);

        $pembelian->pemesanan_id = $id_explode[0];
        $pembelian->keterangan = $request->keterangan;
        $pembelian->save();

        $barang = Barang::findOrFail($id_explode[1]);
        $barang->jumlah_parfum += $id_explode[2];
        $barang->save();

        $status = Pembelian::findOrFail($id_explode[0]);
        $status->status = "Diterima Gudang";
        $status->save();

        // return $request;
        return redirect('final_pembelian')->with('status', 'Pembelian berhasil ditambah');
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
