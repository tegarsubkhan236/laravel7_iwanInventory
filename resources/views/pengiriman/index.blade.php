@extends('main')
@section('title', 'Pengiriman')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Pengiriman</strong>
                    </div>
                    {{-- <div class="pull-right">
                        @if (Auth::user()->name == "gudang")
                        <a href="{{ route('pengiriman.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
                        </a>
                        @endif
                    </div> --}}
                    @if (Auth::user()->name =='owner')
                    <div class="pull-right">
                        <a href="{{ url('/pengiriman/cetak') }}" class="btn btn-success btn-sm">
                            Cetak Laporan
                        </a>
                    </div>
                    @endif
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Mitra Toko</th>
                                <th>Bibit Parfum</th>
                                <th>Harga Re-seller</th>
                                <th>Jumlah / ml</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengiriman as $x)
                            <tr>
                                <td>PNGRMN{{ $x->id }}</td>
                                <td>{{ $x->created_at->format('d-m-Y') }}</td>
                                <td>{{ $x->pelanggan->nama }}</td>
                                <td>{{ $x->barang->nama_parfum }}</td>
                                <td>Rp. {{ $x->barang->harga_reseller }}</td>
                                <td>{{ $x->jumlah }} ml</td>
                                <td>Rp. {{  $total_penjualan = $x->jumlah * $x->barang->harga_reseller}}</td>
                                <td>{{ $x->status }} </td>
                                <td class="text-center">
                                    @if (Auth::user()->name == 'gudang' && $x->status == 'Menunggu Acc Owner')
                                    <a href="{{ url('pengiriman/'.$x->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        Edit Data
                                    </a>
                                    @endif
                                    @if (Auth::user()->name == 'owner' && $x->status == 'Menunggu Acc Owner')
                                    <a href="{{ url('pengiriman/'.$x->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        Ubah Status
                                    </a>
                                    @endif
                                    @if (Auth::user()->name == 'gudang' && $x->status == 'Acc Owner')
                                    <a href="{{ url('pengiriman/'.$x->id) }}" class="btn btn-success btn-sm">
                                        Cetak
                                    </a>
                                    <a href="{{ url('pengiriman/'.$x->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        Ubah Status
                                    </a>
                                    @endif
                                    @if (Auth::user()->name == 'gudang' && $x->status == 'Proses Pengiriman')
                                    <a href="{{ url('pengiriman/'.$x->id.'/edit') }}" class="btn btn-success btn-sm">
                                        Kirim
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>
</div>
</div>
@endsection