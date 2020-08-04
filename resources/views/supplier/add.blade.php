@extends('main')
@section('title', 'supplier')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data supplier</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('supplier') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
            <form action="{{url('supplier')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" 
                    name="nama" 
                    value="{{ old('nama') }}" 
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
                    value="{{ old('no_telp') }}" 
                    class="form-control 
                    @error('no_telp') is-invalid @enderror" autofocus>
                    @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">
                    {{ old('alamat') }}
                    </textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Min Parfum</label>
                    <input type="number" 
                    name="min_parfum" 
                    value="{{ old('min_parfum') }}" 
                    class="form-control 
                    @error('min_parfum') is-invalid @enderror" autofocus>
                    @error('min_parfum')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Min Botol</label>
                    <input type="number" 
                    name="min_botol" 
                    value="{{ old('min_botol') }}" 
                    class="form-control 
                    @error('min_botol') is-invalid @enderror" autofocus>
                    @error('min_botol')
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
