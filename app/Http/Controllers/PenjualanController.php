<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Pelanggan;
use App\Barang;
use App\Botol;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::with('pelanggan', 'barang', 'botol')->get();
        $pelanggan = Pelanggan::all();
        $barang = Barang::all();
        $botol = Botol::all();
        return view('penjualan.index', compact('penjualan', 'pelanggan', 'barang', 'botol'));
        // return $penjualan;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'pelanggan_id' => 'required',
        ]);
        $penjualan = new Penjualan;

        if ($request['botol_id'] === 'null') {
            $request['botol_id'] = null; // or 'NULL' for SQL
        } else {
            $botol_id = $request['botol_id'];
            $botol_id_explode = explode('|', $botol_id);

            $penjualan->botol_id = $botol_id_explode[0];

            $botol = Botol::findOrFail($botol_id_explode[0]);
            $botol->jumlah_botol -= $botol_id_explode[1];
            $botol->save();
        }


        $penjualan->pelanggan_id = $request->pelanggan_id;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->barang_id = $request->barang_id;
        $penjualan->total_penjualan = 0;
        $penjualan->save();

        $barang = Barang::findOrFail($request->barang_id);
        $barang->jumlah_parfum -= $request->jumlah;
        $barang->save();

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
        return view('penjualan.update', ['penjualan' => $penjualan]);
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
