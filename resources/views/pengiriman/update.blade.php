@extends('main')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengiriman</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengiriman</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <form action="{{url('pengiriman',$pengiriman->id)}}" method="POST">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label>Nama Bibit Parfum</label>
                    <input type="text" value="{{ $pengiriman->barang->nama_parfum }}" class="form-control" readonly>
                    <input type="text" name="barang_id" value="{{$pengiriman->barang->id}}" hidden>
                </div>

                <div class="form-group">
                    <label>Jumlah / ml</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah', $pengiriman->jumlah) }}" class="form-control" autofocus readonly>
                </div>

                <div class="form-group">
                    <label>Harga Reseller</label>
                    <input type="number" name="harga" value="{{ $pengiriman->barang->harga_reseller }}"class="form-control" autofocus readonly>
                </div>

                <div class="form-group">
                    <label>Total Harga Penjualan</label>
                    <input type="text" name="total" value="{{  $total_penjualan = $pengiriman->jumlah * $pengiriman->barang->harga_penjualan }} " class="form-control" readonly>
                </div>

                @if (Auth::user()->name == 'gudang' && $pengiriman->status == 'Menunggu Acc Owner')
                    <h3>Ubah Data Pengiriman</h3><br>
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
                        <input type="number" name="jumlah" value="{{ old('jumlah', $pengiriman->jumlah) }}" class="form-control" autofocus>
                    </div>

                    <input type="text" name="status" value="Menunggu Acc Owner" hidden>
                @endif

                @if (Auth::user()->name == 'owner' && $pengiriman->status == 'Menunggu Acc Owner')
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Acc Owner">Acc Owner</option>
                    </select>
                </div>
                @endif

                @if (Auth::user()->name == 'gudang' && $pengiriman->status == 'Acc Owner')
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Proses Pengiriman">Proses Pengiriman</option>
                    </select>
                </div>
                @endif
            
                @if (Auth::user()->name == 'gudang' && $pengiriman->status == 'Proses Pengiriman')
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Diterima ReSeller">Diterima ReSeller</option>
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
@endsection