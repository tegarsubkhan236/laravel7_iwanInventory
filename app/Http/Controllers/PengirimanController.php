<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pelanggan;
use App\Pengiriman;
use Illuminate\Http\Request;
use PDF;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengiriman = Pengiriman::all()->sortByDesc('id');
        $barang = Barang::all();
        $pelanggan = Pelanggan::all();
        // $total = Pengiriman::with('barang', 'pelanggan')->sum('total_penjualan');
        return view('pengiriman.index', compact('pengiriman', 'pelanggan', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $pelanggan = Pelanggan::all();
        return view('pengiriman.add', compact('barang', 'pelanggan'));
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
        $pengiriman = new Pengiriman();
        $pengiriman->pelanggan_id = $request->pelanggan_id;
        $pengiriman->jumlah = $request->jumlah;
        $pengiriman->barang_id = $request->barang_id;
        $pengiriman->total_penjualan = 0;
        $pengiriman->status = "Menunggu Acc Owner";
        $pengiriman->save();

        return redirect('pengiriman')->with('status', 'Pengajuan Pengiriman berhasil di ajukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengiriman = Pengiriman::find($id);

        $pdf = PDF::loadview('nota_pengiriman', compact('pengiriman'))->setPaper('a4', 'landscape');
        return $pdf->download('nota_pemesanan_parfum');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengiriman = Pengiriman::find($id);
        $barang = Barang::all();
        return view('pengiriman.update', compact('pengiriman', 'barang'));
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
        $pengiriman = Pengiriman::find($id);

        if ($request->status == "Menunggu Acc Owner") {
            $pengiriman->barang_id = $request->barang_id;
            $pengiriman->jumlah = $request->jumlah;
        }

        if ($request->status == "Diterima ReSeller") {
            $barang = Barang::findOrFail($request->barang_id);
            $barang->jumlah_parfum = $barang->jumlah_parfum - $request->jumlah;
            $barang->save();

            $pengiriman->total_penjualan = $request->total;
        }

        $pengiriman->status = $request->status;
        $pengiriman->save();
        return redirect('pengiriman')->with('status', 'Data pengiriman berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengiriman = Pengiriman::find($id);
        $pengiriman->delete($pengiriman);
        return redirect('pengiriman')->with('status', 'Data pengiriman berhasil di Delete!');
    }
}
