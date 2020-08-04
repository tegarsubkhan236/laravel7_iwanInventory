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
                            <form action="{{url('penjualan')}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Bibit Parfum</label>
                                    <select name="barang_id" class="form-control">
                                        @foreach ($barang as $item)
                                        <option value="{{ $item->id }} | {{ $item->harga_penjualan }}"> {{ $item->nama_parfum }} [{{ $item->harga_penjualan }}] </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Botol</label>
                                    <select name="botol_id" class="form-control">
                                        {{-- <option value='null'> ==Tidak Menggunakan Botol== </option> --}}
                                        @foreach ($botol as $item)
                                        <option value="{{ $item->id }} | {{ $item->harga_penjualan }}"> {{ $item->nama_botol }} [{{ $item->harga_penjualan }}] </option>
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
