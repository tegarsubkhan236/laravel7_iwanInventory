<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pembelian;
use App\Providers\AppServiceProvider;
use PDF;

class BarangController extends Controller
{
    public function cetak()
    {
        $data = Barang::all();
        $tanggal = Barang::latest('created_at')->first();

        $pdf = PDF::loadview('laporan_parfum', compact('data', 'tanggal'));
        return $pdf->download('laporan_parfum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();
        $pembelian = Pembelian::all();
        return view('barang.index', compact('data', 'pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.add');
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
            'nama_parfum' => 'required',
            'jumlah_parfum' => 'required',
            'min_stock' => 'required',
            'harga_penjualan' => 'numeric|required|lebih_dari:harga_reseller',
            'harga_reseller' => 'numeric|required',
            // 'harga_penjualan' => 'numeric|required|Harga_penjualan_harus_lebih_besar_dari_harga_pembelian:harga_pembelian',
        ]);
        $messages = [
            'validation.greater_than_field' => ' harus lebih besar dari harga pembelian.',
        ];
        $data = new Barang;
        $data->nama_parfum = $request->nama_parfum;
        $data->jumlah_parfum = $request->jumlah_parfum;
        $data->min_stock = $request->min_stock;
        $data->harga_penjualan = $request->harga_penjualan;
        $data->harga_reseller = $request->harga_reseller;
        $data->save();
        return redirect('barang')->with('status', 'Data parfum berhasil di Tambah !');
        // return $request;
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
        $data = Barang::find($id);
        return view("barang.update", compact('data'));
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
            'nama_parfum' => 'required',
            'min_stock' => 'required',
            'jumlah_parfum' => 'required',
            'harga_penjualan' => 'numeric|required|lebih_dari:harga_reseller',
            'harga_reseller' => 'numeric|required',
        ]);
        $data = Barang::find($id);
        $data->nama_parfum = $request->nama_parfum;
        $data->jumlah_parfum = $request->jumlah_parfum;
        $data->min_stock = $request->min_stock;
        $data->harga_penjualan = $request->harga_penjualan;
        $data->harga_reseller = $request->harga_reseller;
        $data->save();
        return redirect('barang')->with('status', 'Data parfum berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect('barang')->with('status', 'Data parfum berhasil di Delete!');
    }
}
