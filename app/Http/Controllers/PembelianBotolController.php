<?php

namespace App\Http\Controllers;

use App\Botol;
use App\PembelianBotol;
use App\Supplier;
use Illuminate\Http\Request;

class PembelianBotolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian = PembelianBotol::all();
        $botol = Botol::all();
        $supplier = Supplier::all();
        return view('botol.pembelian.index', compact('pembelian', 'botol', 'supplier'));
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
            'botol_id' => 'required',
            'supplier_id' => 'required',
            'jumlah' => 'required',
        ]);
        $pembelian = new PembelianBotol();
        $pembelian->supplier_id = $request->supplier_id;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->botol_id = $request->botol_id;
        $pembelian->total_pembelian = 0;
        $pembelian->save();

        $botol = Botol::findOrFail($request->botol_id);
        $botol->jumlah_botol += $request->jumlah;
        $botol->save();

        // return $request;
        return redirect('pembelian_botol')->with('status', 'Pembelian Botol berhasil');
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
        $pembelian = PembelianBotol::find($id);
        return view('botol.pembelian.update', compact('pembelian'));
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
