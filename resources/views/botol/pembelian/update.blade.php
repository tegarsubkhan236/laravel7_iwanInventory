@extends('main')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detil Pembelian Botol</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detil pembelian Botol</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('pembelian_botol',$pembelian->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" name="supplier_id" value="{{ $pembelian->supplier->nama }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Alamat Supplier</label>
                    <input type="text" name="supplier_id" value="{{ $pembelian->supplier->alamat }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>No Telp Supplier</label>
                    <input type="text" name="supplier_id" value="{{ $pembelian->supplier->no_telp }}" class="form-control" readonly>
                </div>
                <hr>

                <div class="form-group">
                    <label>Nama Botol</label>
                    <input type="text" name="botol_id" value="{{ $pembelian->botol->nama_botol }} " class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Harga Pembelian</label>
                    <input type="text" name="botol_id" value="Rp.{{ format_uang($pembelian->botol->harga_pembelian) }}" class="form-control" readonly>
                </div>
                <hr>

                <div class="form-group">
                    <label>Tanggal Pembelian</label>
                    <input type="text" name="barang_id" value="{{ $pembelian->created_at->format('d-m-Y') }} " class="form-control" readonly>
                </div>
                <hr>
                
                <div class="form-group">
                    <label>Jumlah / ml</label>
                    <input type="number" 
                    name="jumlah" 
                    value="{{ old('jumlah', $pembelian->jumlah) }}" 
                    class="form-control 
                    @error('jumlah') is-invalid @enderror" autofocus readonly>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Total Harga Pembelian</label>
                    <input type="text" name="barang_id" value="Rp. {{  format_uang($total_pembelian = $pembelian->jumlah * $pembelian->botol->harga_pembelian) }} " class="form-control" readonly>
                </div>
                
                <button class="btn btn-secondary" type="button" onclick="history.go(-1);" data-dismiss="modal">Kembali</button>
                {{-- <button class="btn btn-success" type="submit">Save</button> --}}
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection