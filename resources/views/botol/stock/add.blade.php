@extends('main')
@section('title', 'Botol')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Botol</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('botol') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
            <form action="{{url('botol')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Botol</label>
                    <input type="text" 
                    name="nama_botol" 
                    value="{{ old('nama_botol') }}" 
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
                    value="0" 
                    class="form-control 
                    @error('jumlah_botol') is-invalid @enderror" autofocus readonly>
                    @error('jumlah_botol')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Minimal Stock</label>
                    <input type="number" 
                    name="min_stock" 
                    value="{{ old('min_stock') }}" 
                    class="form-control 
                    @error('min_stock') is-invalid @enderror" autofocus>
                    @error('min_stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga Penjualan</label>
                    <input 
                    type="number" 
                    name="harga_penjualan" 
                    value="{{ old('harga_penjualan') }}" 
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
                    value="{{ old('harga_reseller') }}" 
                    class="form-control 
                    @error('harga_reseller') is-invalid @enderror" 
                    autofocus
                    >
                    @error('harga_reseller')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <button class="btn btn-success" type="submit">Save</button>
        </form>
        </div>
    </div>
</div>
</div>

</div>
</div>
@endsection

