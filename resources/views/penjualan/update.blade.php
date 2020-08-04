@extends('main')
@section('title', 'Penjualan Dengan Botol')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Penjualan Dengan Botol</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('penjualan') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                        <form action="{{url('penjualan',$penjualan->id)}}" method="POST">
                            @method('PATCH')
                            @csrf

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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
