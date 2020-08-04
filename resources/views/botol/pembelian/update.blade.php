@extends('main')
@section('title', 'Pembelian Botol')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Pembelian Botol</strong>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            
            <form action="{{url('pembelian_botol',$pembelian->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Nama Botol</label>
                    <input type="text"  value="{{ $pembelian->botol->nama_botol }} " class="form-control" readonly>
                    <input type="text" name="botol_id" value="{{$pembelian->botol->id}}" hidden>
                </div>
                <div class="form-group">
                    <label>Harga Pembelian</label>
                    <input type="text" name="harga" value="Rp.{{ format_uang($pembelian->harga) }}" class="form-control" readonly>
                </div>
                <hr>

                <div class="form-group">
                    <label>Tanggal Pembelian</label>
                    <input type="text" value="{{ $pembelian->created_at->format('d-m-Y') }} " class="form-control" readonly>
                </div>
                <hr>
                
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah', $pembelian->jumlah) }}" class="form-control" autofocus readonly>
                </div>
                
                <div class="form-group">
                    <label>Total Harga Pembelian</label>
                    <input type="text" name="total" value="{{  $total_pembelian = $pembelian->jumlah * $pembelian->harga }}" class="form-control" readonly>
                </div>

                @if (Auth::user()->name == 'gudang' && $pembelian->status == "Menunggu Acc Owner")
                <br><br><h3>Edit Data Pemesanan Botol</h3><br>
                <div class="form-group">
                    <label>Minimal Pesan Botol</label>
                    <input type="number" name="min_botol" value="{{ $pembelian->supplier->min_botol }}" class="form-control @error('min_parfum') is-invalid @enderror" readonly>
                    @error('min_botol')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Jumlah / ml</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah', $pembelian->jumlah) }}" class="form-control @error('jumlah') is-invalid @enderror" autofocus>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga Pembelian</label>
                    <input type="number" name="harga" value="{{old('harga', $pembelian->harga)}}"class="form-control" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="status" value="Menunggu Acc Owner" hidden>
                </div>
                @endif

                @if (Auth::user()->name == 'owner')
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Acc Owner">Acc Owner</option>
                    </select>
                </div>
                @endif

                @if (Auth::user()->name == 'gudang' && $pembelian->status == "Acc Owner")
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Proses Pembelian">Proses Pembelian</option>
                    </select>
                </div>
                @endif
                

                <button class="btn btn-secondary" type="button" onclick="history.go(-1);" data-dismiss="modal">Kembali</button>
                <button class="btn btn-success" type="submit">Update</button>
        </form>
        </div>
    </div>
</div>
</div>

</div>
</div>
@endsection