@extends('main')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Botol</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Botol</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('botol',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Botol</label>
                    <input type="text" 
                    name="nama_botol" 
                    value="{{old('nama_botol', $data->nama_botol)}}" 
                    class="form-control 
                    @error('nama_botol') is-invalid @enderror" autofocus>
                    @error('nama_botol')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" 
                    name="jumlah_botol" 
                    value="{{old('jumlah_botol', $data->jumlah_botol)}}" 
                    class="form-control 
                    @error('jumlah_botol') is-invalid @enderror" autofocus readonly>
                    @error('jumlah_botol')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga Pembelian</label>
                    <input 
                    type="number" 
                    name="harga_pembelian" 
                    value="{{old('harga_pembelian', $data->harga_pembelian)}}" 
                    class="form-control 
                    @error('harga_pembelian') is-invalid @enderror" 
                    autofocus>
                    @error('harga_pembelian')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga Penjualan</label>
                    <input 
                    type="number" 
                    name="harga_penjualan" 
                    value="{{old('harga_penjualan', $data->harga_penjualan)}}" 
                    class="form-control 
                    @error('harga_penjualan') is-invalid @enderror" 
                    autofocus
                    >
                    @error('harga_penjualan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-secondary" type="button" onclick="history.go(-1);" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection