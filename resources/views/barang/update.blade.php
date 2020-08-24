@extends('main')
@section('title', 'Bibit Parfum')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Bibit Parfum</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('barang') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
            <form action="{{url('barang',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Nama Bibit Parfum</label>
                    <input type="text" 
                    name="nama_parfum" 
                    value="{{old('nama_parfum', $data->nama_parfum)}}" 
                    class="form-control 
                    @error('nama_parfum') is-invalid @enderror" autofocus>
                    @error('nama_parfum')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jumlah / ml</label>
                    <input type="number" 
                    name="jumlah_parfum" 
                    value="{{old('jumlah_parfum', $data->jumlah_parfum)}}" 
                    class="form-control 
                    @error('jumlah_parfum') is-invalid @enderror" autofocus readonly>
                    @error('jumlah_parfum')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Minimal Stock</label>
                    <input type="number" 
                    name="min_stock" 
                    value="{{ old('min_stock', $data->min_stock) }}" 
                    class="form-control 
                    @error('min_stock') is-invalid @enderror" autofocus readonly>
                    @error('min_stock')
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
                
                <div class="form-group">
                    <label>Harga Reseller</label>
                    <input 
                    type="number" 
                    name="harga_reseller" 
                    value="{{old('harga_reseller', $data->harga_reseller)}}" 
                    class="form-control 
                    @error('harga_reseller') is-invalid @enderror" 
                    autofocus
                    >
                    @error('harga_reseller')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-success" type="submit">Update</button>
        </form>
        </div>
    </div>
</div>
</div>

</div>
</div>
@endsection