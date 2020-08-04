<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.add');
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
            'min_parfum' => 'required',
            'min_botol' => 'required',
        ]);
        $data = new Supplier;
        $data->nama = $request->nama;
        $data->no_telp = $request->no_telp;
        $data->alamat = $request->alamat;
        $data->min_parfum = $request->min_parfum;
        $data->min_botol = $request->min_botol;
        $data->save();
        return redirect('supplier')->with('status', 'Data supplier berhasil di Tambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $data = Supplier::find($supplier)->first();
        return view("supplier.update", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'min_parfum' => 'required',
            'min_botol' => 'required',
        ]);
        $data = Supplier::find($supplier)->first();
        $data->nama = $request->nama;
        $data->no_telp = $request->no_telp;
        $data->alamat = $request->alamat;
        $data->min_parfum = $request->min_parfum;
        $data->min_botol = $request->min_botol;
        $data->save();
        return redirect('supplier')->with('status', 'Data supplier berhasil di Tambah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $data = Supplier::find($supplier);
        $data->delete();
        return redirect('supplier')->with('status', 'Data supplier berhasil di Delete!');
    }
}
