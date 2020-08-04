<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pembelian;
use App\Supplier;
use Illuminate\Http\Request;
use PDF;

class PembelianController extends Controller
{
    public function cetak()
    {
        $pembelian = Pembelian::all();
        $supplier = Supplier::all();
        $barang = Barang::all();
        $total = Pembelian::where('status', 'Diterima Gudang ')->sum('total_pembelian');

        $pdf = PDF::loadview('laporan_pembelian', compact('pembelian', 'supplier', 'barang', 'total'));
        return $pdf->download('laporan_pembelian');
    }

    public function index()
    {
        $pembelian = Pembelian::all();
        $supplier = Supplier::all();
        $barang = Barang::all();
        $total = Pembelian::where('status', 'Diterima Gudang ')->sum('total_pembelian');
        return view('pembelian.index', [
            'pembelian' => $pembelian,
            'supplier' => $supplier,
            'barang' => $barang,
            'total' => $total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        $barang = Barang::all();
        return view('pembelian.add', compact('supplier', 'barang'));
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
            'id_barang' => 'required',
            'supplier_id' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);
        $pembelian = new Pembelian;

        $supp = $request->supplier_id;
        $supp_explode = explode('|', $supp);

        $pembelian->supplier_id = $supp_explode[0];
        $pembelian->harga = $request->harga;
        $pembelian->id_barang = $request->id_barang;
        $pembelian->total_pembelian = 0;
        $pembelian->status = "Menunggu Acc Owner";

        if ($request->jumlah >= $supp_explode[1]) {
            $pembelian->jumlah = $request->jumlah;
        } else {
            return "Pemesanan tidak memenuhi Syarat minimal pemesanan dari supplier";
        }
        $pembelian->save();

        // $barang = Barang::findOrFail($request->id_barang);
        // $barang->jumlah_parfum += $request->jumlah;
        // $barang->save();

        // return $request;
        return redirect('pembelian')->with('status', 'Pengajuan pemesanan berhasil di ajukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemesanan = Pembelian::find($id);
        // return view('penjualan.update', ['penjualan' => $penjualan]);

        $pdf = PDF::loadview('nota_pemesanan_parfum', compact('pemesanan'))->setPaper('a4', 'landscape');
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
        $pembelian = Pembelian::find($id);
        $supplier = Supplier::all();
        return view('pembelian.update', compact('pembelian', 'supplier'));
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
        $pembelian = Pembelian::find($id);

        if ($request->status == "Menunggu Acc Owner") {
            $validateData = $request->validate([
                'min_parfum' => 'required|numeric',
                'jumlah' => 'required|numeric|lebih_dari:min_parfum',
                'harga' => 'required',
            ]);

            $pembelian->id_barang = $request->barang_id;
            $pembelian->harga = $request->harga;
            $pembelian->jumlah = $request->jumlah;
        }

        $pembelian->status = $request->status;
        $pembelian->save();
        return redirect('pembelian')->with('status', 'Data pembelian berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete($pembelian);
        return redirect('pembelian')->with('status', 'Data pembelian berhasil di Delete!');
    }
}
