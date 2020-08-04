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
                        <strong>Pemesanan Bibit Parfum</strong>
                    </div>
                    @if (Auth::user()->name =='gudang')
                    <div class="pull-right">
                        <a href="{{ route('pembelian.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div>
                    @endif
                    @if (Auth::user()->name =='owner')
                    <div class="pull-right">
                        <a href="{{ url('/pembelian/cetak') }}" class="btn btn-success btn-sm">
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
                        <th>No Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama Supplier</th>
                        <th>Nama Bibit Parfum</th>
                        <th>Jumlah / ml</th>
                        <th>Harga Pembelian</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembelian as $x)
                    <tr>
                        <td>BL{{ $x->id }}</td>
                        <td>{{ $x->created_at->format('d-m-Y') }}</td>
                        <td>{{ $x->supplier->nama }}</td>
                        <td>{{ $x->barang->nama_parfum }}</td>
                        <td>{{ $x->jumlah }} ml</td>
                        <td>Rp. {{ format_uang($x->harga) }}</td>
                        <td>Rp. {{  format_uang($total_pembelian = $x->jumlah * $x->harga) }}</td>
                        <td>{{ $x->status }} </td>
                        
                        <td class="text-center">
                            @if (Auth::user()->name == 'owner' && $x->status == 'Menunggu Acc Owner')
                            <a href="{{ url('pembelian/'.$x->id.'/edit') }}" class="btn btn-primary btn-sm">
                                Ubah Status
                            </a>
                            @endif
                            @if (Auth::user()->name == 'gudang' && $x->status == 'Menunggu Acc Owner')
                            
                            @endif
                            @if (Auth::user()->name == 'gudang' && $x->status == 'Acc Owner')
                                <a href="{{ url('pembelian/'.$x->id) }}" class="btn btn-primary btn-sm">
                                    Cetak
                                </a>
                                <a href="{{ url('pembelian/'.$x->id.'/edit') }}" class="btn btn-success btn-sm">
                                    Ubah Status
                                </a>
                                <a href="{{ url('pembelian/'.$x->id.'/edit') }}" class="btn btn-warning btn-sm">
                                    Edit Data
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <td colspan="6">Total Pembelian Bibit Parfum</td>
                        <td>{{}}</td>
                    </tr>
                </tfoot> --}}
            </table>
        </div>
    </div>
    </div>    
    </div>
    </div>
    </div>
@endsection