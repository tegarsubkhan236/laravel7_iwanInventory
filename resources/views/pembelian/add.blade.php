@extends('main')
@section('title', 'Pembelian Bibit Parfum')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Pemesanan Bibit Parfum</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('pembelian') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
            <form action="{{url('pembelian')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Supplier</label>
                    <select name="supplier_id" class="form-control">
                        @foreach ($supplier as $item)
                        <option value="{{ $item->id }}|{{ $item->min_parfum }}">{{ $item->id }} - {{ $item->nama }} - min pesan [{{ $item->min_parfum }}] </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Bibit Parfum</label>
                    <select name="id_barang" class="form-control">
                        @foreach ($barang as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama_parfum }}. [{{ $item->jumlah_parfum }}]</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Jumlah / ml</label>
                    <input type="number" 
                    name="jumlah" 
                    value="{{ old('jumlah') }}" 
                    class="form-control 
                    @error('jumlah') is-invalid @enderror" autofocus>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Harga Pembelian</label>
                    <input 
                    type="number" 
                    name="harga"
                    value="{{ old('harga') }}"
                    class="form-control 
                    @error('harga') is-invalid @enderror" 
                    autofocus>
                    @error('harga')
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

