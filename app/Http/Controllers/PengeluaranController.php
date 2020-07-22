<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
use App\Barang;
use App\Penjualan;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::with('penjualan')->get();
        $total = Penjualan::with('barang')->where('barang_id', '2')->sum('jumlah');
        return view('pengeluaran.index', compact('pengeluaran', 'total'));
        // return $pengeluaran;

        // $barang = Barang::findOrFail($request->barang_id);
        // $barang->jumlah_parfum -= $request->jumlah;
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
            'id_parfum' => 'required',
            'jumlah_terjual' => 'required',
        ]);
        $data = new Pengeluaran;
        $data->id_parfum = $request->id_parfum;
        $data->jumlah_terjual = $request->jumlah_terjual;
        $data->save();
        if ($data->save()) {
            return redirect('pengeluaran')->with('status', 'Data pengeluaran berhasil di Tambah !');
        } else {
            return "ERROR";
        }
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
        $data = Pengeluaran::find($id);
        $data->delete();
        return redirect('pengeluaran')->with('status', 'Data pengeluaran berhasil di Delete!');
    }
}
