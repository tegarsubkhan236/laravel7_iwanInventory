@extends('main')
@section('title', 'Pembelian Botol')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Pembelian Botol</strong>
                    </div>
                    @if (Auth::user()->name =='gudang')
                    <div class="pull-right">
                        <a href="{{ route('final_pembelian_botol.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div>
                    @endif
                    @if (Auth::user()->name =='owner')
                    <div class="pull-right">
                        <a href="{{ url('/final_pembelian_botol/cetak') }}" class="btn btn-success btn-sm">
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
                        <th>Botol</th>
                        <th>Jumlah</th>
                        <th>Harga Pembelian</th>
                        <th>Total Harga</th>
                        <th>Keterangan</th>
                        {{-- <th>Status</th> --}}
                        {{-- @if (Auth::user()->name == 'owner')
                        <th>Action</th>
                        @endif --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($final_pembelian as $x)
                    <tr>
                        <td>FIX_BL-BTL{{ $x->id }}</td>
                        <td>BL-BTL{{ $x->pemesanan->id }}</td>
                        <td>{{ $x->pemesanan->created_at->format('d-m-Y') }}</td>
                        <td>{{ $x->pemesanan->supplier->nama }}</td>
                        <td>{{ $x->pemesanan->botol->nama_botol }}</td>
                        <td>{{ $x->pemesanan->jumlah }} ml</td>
                        <td>Rp. {{ format_uang($x->pemesanan->harga) }}</td>
                        <td>Rp. {{  format_uang($total_pembelian = $x->pemesanan->jumlah *  $x->pemesanan->harga) }}</td>
                        <td>{{ $x->keterangan }} </td>
                        {{-- <td>{{ $x->status }} </td> --}}
                        {{-- @if (Auth::user()->name == 'owner')
                        <td class="text-center">
                            <a href="{{ url('pembelian/'.$x->id.'/edit') }}" class="btn btn-primary btn-sm">
                                Ubah Status
                            </a>
                        </td>
                        @endif --}}
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