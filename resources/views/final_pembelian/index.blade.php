@extends('main')
@section('title', 'Pembelian Bibit Parfum')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Pembelian Bibit Parfum</strong>
                    </div>
                    @if (Auth::user()->name =='gudang')
                    <div class="pull-right">
                        <a href="{{ route('final_pembelian.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div>
                    @endif
                    @if (Auth::user()->name =='owner')
                    <div class="pull-right">
                        <a href="{{ url('/final_pembelian/cetak') }}" class="btn btn-success btn-sm">
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
                        <th>No Pembelian</th>
                        <th>No Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama Supplier</th>
                        <th>Nama Bibit Parfum</th>
                        <th>Jumlah / ml</th>
                        <th>Harga Pembelian</th>
                        <th>Total Harga</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($final_pembelian as $x)
                    <tr>
                        <td>FIX_BL{{ $x->id }}</td>
                        <td>BL{{ $x->pemesanan->id }}</td>
                        <td>{{ $x->pemesanan->created_at->format('d-m-Y') }}</td>
                        <td>{{ $x->pemesanan->supplier->nama }}</td>
                        <td>{{ $x->pemesanan->barang->nama_parfum }}</td>
                        <td>{{ $x->jumlah }} ml</td>
                        <td>Rp. {{ format_uang($x->harga) }}</td>
                        <td>Rp. {{  format_uang($total_pembelian = $x->jumlah *  $x->harga) }}</td>
                        <td>{{ $x->keterangan }} </td>
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