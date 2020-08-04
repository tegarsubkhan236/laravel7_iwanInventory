<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Barang;
use App\Botol;
use PDF;

class PenjualanController extends Controller
{
    public function cetak()
    {
        $penjualan = Penjualan::with('barang', 'botol')->get();
        $barang = Barang::all();
        $botol = Botol::all();
        $total = Penjualan::with('barang', 'botol')->sum('total_penjualan');
        $tanggal = Penjualan::latest('created_at')->first();

        $pdf = PDF::loadview('laporan_penjualan', compact('penjualan', 'barang', 'botol', 'total', 'tanggal'));
        return $pdf->download('laporan_penjualan');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::with('barang', 'botol')->get();
        $barang = Barang::all();
        $botol = Botol::all();
        $total = Penjualan::with('barang', 'botol')->sum('total_penjualan');
        return view('penjualan.index', compact('penjualan', 'barang', 'botol', 'total'));
        // return $total_penjualan;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $botol = Botol::all();
        return view('penjualan.add', compact('barang', 'botol'));
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
        $penjualan = new Penjualan;

        $botol_id = $request['botol_id'];
        $botol_id_explode = explode('|', $botol_id);

        $botol = Botol::findOrFail($botol_id_explode[0]);
        $botol->jumlah_botol -= 1;
        $botol->save();

        $barang_id = $request['barang_id'];
        $barang_id_explode = explode('|', $barang_id);

        $barang = Barang::findOrFail($request->barang_id);
        $barang->jumlah_parfum -= $request->jumlah;
        $barang->save();

        $penjualan->botol_id = $botol_id_explode[0];
        $penjualan->barang_id = $barang_id_explode[0];
        $penjualan->jumlah = $request->jumlah;
        $penjualan->total_penjualan = $request->jumlah * $barang_id_explode[1] + $botol_id_explode[1];
        $penjualan->save();

        return redirect('penjualan')->with('status', 'Data penjualan berhasil di Tambah !');
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
        $penjualan = Penjualan::find($id);
        // return view('penjualan.update', ['penjualan' => $penjualan]);

        $pdf = PDF::loadview('nota_penjualan_full', compact('penjualan'))->setPaper('a4', 'landscape');
        return $pdf->download('nota_penjualan_full');
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

        // $barang = Barang::findOrFail($request->barang_id);
        // if ($penjualan->jumlah > $request->jumlah) {
        //     $barang->jumlah_parfum -= $request->jumlah;
        //     $barang->save();
        // }

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
        $penjualan = \App\Penjualan::find($id);
        $penjualan->delete($penjualan);
        return redirect('penjualan')->with('status', 'Data penjualan berhasil di Delete!');
    }
}
