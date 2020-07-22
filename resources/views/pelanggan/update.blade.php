@extends('main')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table Pelanggan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelanggan Parfum</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
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
                
                <button class="btn btn-secondary" type="button" onclick="history.go(-1);" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection