<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
        $data = new Pelanggan;
        $data->nama = $request->nama;
        $data->no_telp = $request->no_telp;
        $data->alamat = $request->alamat;
        $data->save();
        return redirect('pelanggan')->with('status', 'Data pelanggan berhasil di Tambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pelanggan::find($id);
        return view("pelanggan.update", compact('data'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
        $data = Pelanggan::find($id);
        $data->nama = $request->nama;
        $data->no_telp = $request->no_telp;
        $data->alamat = $request->alamat;
        $data->save();
        return redirect('pelanggan')->with('status', 'Data pelanggan berhasil di Tambah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pelanggan::find($id);
        $data->delete();
        return redirect('pelanggan')->with('status', 'Data pelanggan berhasil di Delete!');
    }
}
