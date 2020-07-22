@extends('main')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detil Penjualan Bibit Parfum</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detil Penjualan Bibit Parfum</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('penjualan',$penjualan->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" value="{{ $penjualan->pelanggan->nama }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Alamat Pelanggan</label>
                    <input type="text" value="{{ $penjualan->pelanggan->alamat }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>No Telp Pelanggan</label>
                    <input type="text" value="{{ $penjualan->pelanggan->no_telp }}" class="form-control" readonly>
                </div>
                <hr>

                <div class="form-group">
                    <label>Bibit Parfum</label>
                    <input type="text" value="{{ $penjualan->barang->nama_parfum }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" value="Rp. {{ format_uang($penjualan->barang->harga_penjualan) }}" class="form-control" readonly>
                </div>
                <hr>

                <div class="form-group">
                    <label>Tanggal Penjualan</label>
                    <input type="text" value="{{ $penjualan->created_at->format('d-m-Y') }}" class="form-control" readonly>
                </div>
                <hr>
                
                <div class="form-group">
                    <label>Jumlah / ml</label>
                    <input type="number" 
                    name="jumlah" 
                    value="{{ old('jumlah', $penjualan->jumlah) }}" 
                    class="form-control 
                    @error('jumlah') is-invalid @enderror" autofocus readonly>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Total Pembayaran</label>
                    <input type="text" value="Rp. {{  format_uang($total_penjualan = $penjualan->jumlah * $penjualan->barang->harga_penjualan) }}" class="form-control" readonly>
                </div>
                
                <button class="btn btn-secondary" type="button" onclick="history.go(-1);" data-dismiss="modal">Kembali</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection