<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pembelian;
use App\Supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::all();
        $supplier = Supplier::all();
        $barang = Barang::all();
        return view('pembelian.index', [
            'pembelian' => $pembelian,
            'supplier' => $supplier,
            'barang' => $barang,
        ]);
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
            'id_barang' => 'required',
            'supplier_id' => 'required',
            'jumlah' => 'required',
        ]);
        $pembelian = new Pembelian;
        $pembelian->supplier_id = $request->supplier_id;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->id_barang = $request->id_barang;
        $pembelian->total_pembelian = 0;
        $pembelian->save();

        $barang = Barang::findOrFail($request->id_barang);
        $barang->jumlah_parfum += $request->jumlah;
        $barang->save();

        // return $request;
        return redirect('pembelian')->with('status', 'Data pembelian berhasil di Tambah !');
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
        $pembelian = Pembelian::find($id);
        return view('pembelian.update', ['pembelian' => $pembelian]);
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
        $pembelian = Pembelian::find($id);
        $pembelian->jumlah = $request->jumlah;
        $pembelian->total_pembelian = 0;
        $pembelian->save();
        if ($pembelian->save()) {
            return redirect('pembelian')->with('status', 'Data pembelian berhasil di Update !');
        } else {
            return "ERROR";
        }
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
