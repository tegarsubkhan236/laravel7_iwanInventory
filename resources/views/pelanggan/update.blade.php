@extends('main')
@section('title', 'Mitra Toko')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Mitra Toko</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('pelanggan') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
            <form action="{{url('pelanggan',$data->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" 
                    name="nama" 
                    value="{{ old('nama', $data->nama) }}" 
                    class="form-control 
                    @error('nama') is-invalid @enderror" autofocus>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" 
                    name="no_telp" 
                    value="{{ old('no_telp', $data->no_telp) }}" 
                    class="form-control 
                    @error('no_telp') is-invalid @enderror" autofocus>
                    @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                    {{ old('alamat', $data->alamat) }}
                    </textarea>
                    @error('alamat')
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