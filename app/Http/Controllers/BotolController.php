<?php

namespace App\Http\Controllers;

use App\Botol;
use Illuminate\Http\Request;

class BotolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $botol = Botol::all();
        return view('botol.stock.index', compact('botol'));
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
            'nama_botol' => 'required',
            'jumlah_botol' => 'required',
            'harga_pembelian' => 'numeric|required',
            'harga_penjualan' => 'numeric|required|Harga_penjualan_harus_lebih_besar_dari_harga_pembelian:harga_pembelian',
        ]);
        $messages = [
            'validation.greater_than_field' => ' harus lebih besar dari harga pembelian.',
        ];
        $data = new Botol;
        $data->nama_botol = $request->nama_botol;
        $data->jumlah_botol = $request->jumlah_botol;
        $data->harga_pembelian = $request->harga_pembelian;
        $data->harga_penjualan = $request->harga_penjualan;
        $data->save();
        return redirect('botol')->with('status', 'Data botol berhasil di Tambah !');
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
        $data = Botol::find($id);
        return view("botol.stock.update", compact('data'));
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
            'nama_botol' => 'required',
            'jumlah_botol' => 'required',
            'harga_pembelian' => 'numeric|required',
            'harga_penjualan' => 'numeric|required|Harga_penjualan_harus_lebih_besar_dari_harga_pembelian:harga_pembelian',
        ]);
        $messages = [
            'validation.greater_than_field' => ' harus lebih besar dari harga pembelian.',
        ];
        $data = Botol::find($id);
        $data->nama_botol = $request->nama_botol;
        $data->jumlah_botol = $request->jumlah_botol;
        $data->harga_pembelian = $request->harga_pembelian;
        $data->harga_penjualan = $request->harga_penjualan;
        $data->save();
        return redirect('botol')->with('status', 'Data botol berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Botol::find($id);
        $data->delete();
        return redirect('botol')->with('status', 'Data botol berhasil di Delete!');
    }
}
