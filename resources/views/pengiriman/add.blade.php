@extends('main')
@section('title', 'Permintaan')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Permintaan Pengiriman</strong>
                    </div>
                    {{-- <div class="pull-right">
                        <a href="{{ url('pengiriman') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div> --}}
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{url('pengiriman')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Mitra Toko</label>
                                    <select name="pelanggan_id" class="form-control">
                                        @foreach ($pelanggan as $item)
                                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->nama }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Bibit Parfum</label>
                                    <select name="barang_id" class="form-control">
                                        @foreach ($barang as $item)
                                        <option value="{{ $item->id }}"> {{ $item->nama_parfum }} [{{ $item->jumlah_parfum }}]</option>
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
                                
                                <button class="btn btn-success" type="submit">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

