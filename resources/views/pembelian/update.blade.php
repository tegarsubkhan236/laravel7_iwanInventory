@extends('main')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pembelian Bibit Parfum</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pembelian Bibit Parfum</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('pembelian',$pembelian->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" value="{{ $pembelian->supplier->nama }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Bibit Parfum</label>
                    <input type="text" value="{{ $pembelian->barang->nama_parfum }}" class="form-control" readonly>
                    <input type="text" name="barang_id" value="{{$pembelian->barang->id}}" hidden>
                </div>

                <div class="form-group">
                    <label>Tanggal Pembelian</label>
                    <input type="text" value="{{ $pembelian->created_at->format('d-m-Y') }} " class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Jumlah / ml</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah', $pembelian->jumlah) }}" class="form-control" autofocus readonly>
                </div>

                <div class="form-group">
                    <label>Harga Pembelian</label>
                    <input type="number" name="harga" value="{{old('harga', $pembelian->harga)}}"class="form-control" autofocus readonly>
                </div>

                <div class="form-group">
                    <label>Total Harga Pembelian</label>
                    <input type="text" name="total" value="{{  $total_pembelian = $pembelian->jumlah * $pembelian->harga }} " class="form-control" readonly>
                </div>

                @if (Auth::user()->name == 'gudang' && $pembelian->status == "Menunggu Acc Owner")
                <br><br><h3>Edit Data Pemesanan Bibit Parfum</h3><br>
                <div class="form-group">
                    <label>Minimal Pesan Parfum</label>
                    <input type="number" name="min_parfum" value="{{ $pembelian->supplier->min_parfum }}" class="form-control @error('min_parfum') is-invalid @enderror" readonly>
                    @error('min_parfum')
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
                
                <a href="{{ url()->previous() }}"><button class="btn btn-secondary" type="button">Kembali</button></a>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection