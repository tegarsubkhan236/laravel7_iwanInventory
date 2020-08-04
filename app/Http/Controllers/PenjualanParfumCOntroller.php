<?php

namespace App\Http\Controllers;

use App\Barang;
use App\PenjualanParfum;
use Illuminate\Http\Request;
use PDF;

class PenjualanParfumCOntroller extends Controller
{
    public function cetak()
    {
        $penjualan = PenjualanParfum::with('barang')->get();
        $barang = Barang::all();
        $total = PenjualanParfum::with('barang')->sum('total_penjualan');

        $pdf = PDF::loadview('laporan_penjualan_parfum', compact('penjualan', 'barang', 'total'));
        return $pdf->download('laporan_penjualan_parfum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = PenjualanParfum::with('barang')->get();
        $barang = Barang::all();
        $total = PenjualanParfum::with('barang')->sum('total_penjualan');
        return view('penjualan_parfum.index', compact('penjualan', 'barang', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('penjualan_parfum.add', compact('barang'));
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
            'barang_id' => 'required',
        ]);
        $penjualan = new PenjualanParfum();

        $barang_id = $request['barang_id'];
        $barang_id_explode = explode('|', $barang_id);

        $barang = Barang::findOrFail($request->barang_id);
        $barang->jumlah_parfum -= $request->jumlah;
        $barang->save();

        $penjualan->barang_id = $barang_id_explode[0];
        $penjualan->jumlah = $request->jumlah;
        $penjualan->total_penjualan = $request->jumlah * $barang_id_explode[1];
        $penjualan->save();

        return redirect('penjualan_parfum')->with('status', 'Data penjualan berhasil di Tambah !');
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
        $penjualan = PenjualanParfum::find($id);
        $pdf = PDF::loadview('nota_penjualan_parfum', compact('penjualan'))->setPaper('a4', 'landscape');
        return $pdf->download('nota_penjualan_parfum');
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
        $validateData = $request->validate([
            'jumlah' => 'required',

        ]);
        $penjualan = \App\Penjualan::find($id);
        $penjualan->jumlah = $request->jumlah;
        $penjualan->save();

        return redirect('penjualan')->with('status', 'Data penjualan berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan = PenjualanParfum::find($id);
        $penjualan->delete($penjualan);
        return redirect('penjualan_parfum')->with('status', 'Data penjualan berhasil di Delete!');
    }
}
