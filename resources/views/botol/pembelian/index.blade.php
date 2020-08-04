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
                        <strong>Pemesanan Botol</strong>
                    </div>
                    @if (Auth::user()->name =='gudang')
                    <div class="pull-right">
                        <a href="{{ route('pembelian_botol.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div>
                    @endif
                    @if (Auth::user()->name =='owner')
                    <div class="pull-right">
                        <a href="{{ url('/pembelian_botol/cetak') }}" class="btn btn-success btn-sm">
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
                        <th>No_Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama Supplier</th>
                        <th>Botol</th>
                        <th>Harga Beli</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembelian as $x)
                    <tr>
                        <td>BL-BTL{{ $x->id }}</td>
                        <td>{{ $x->created_at->format('d-m-Y') }}</td>
                        <td>{{ $x->supplier->nama }}</td>
                        <td>{{ $x->botol->nama_botol }}</td>
                        <td>Rp. {{ format_uang($x->harga) }}</td>
                        <td>{{ $x->jumlah }}</td>
                        <td>Rp. {{  format_uang($total_pembelian = $x->jumlah * $x->harga) }}</td>
                        <td>{{ $x->status }}</td>
                        @if (Auth::user()->name == "owner")
                        <td class="text-center">
                            <a href="{{ url('pembelian_botol/'.$x->id.'/edit') }}" class="btn btn-primary btn-sm">
                                Ubah Status
                            </a>
                        </td>
                        @endif
                        @if (Auth::user()->name == "gudang" && $x->status == "Menunggu Acc Owner" )
                        <td class="text-center">
                            <a href="{{ url('pembelian_botol/'.$x->id.'/edit') }}" class="btn btn-primary btn-sm">
                                Edit Data
                            </a>
                        </td>
                        @endif
                        @if (Auth::user()->name == "gudang" && $x->status == "Acc Owner" )
                        <td class="text-center">
                            <a href="{{ url('pembelian_botol/'.$x->id) }}" class="btn btn-primary btn-sm">
                                Cetak
                            </a>
                            <a href="{{ url('pembelian_botol/'.$x->id.'/edit') }}" class="btn btn-success btn-sm">
                                Ubah Status
                            </a>
                        </td>
                        @endif
                        @if (Auth::user()->name == "gudang" && $x->status != "Acc Owner" )
                        <td class="text-center">
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <td colspan="6">Total Pembelian</td>
                    <td>{{$total}}</td>
                    <td></td>
                </tfoot> --}}
            </table>
        </div>
    </div>
    </div>    
    </div>
    </div>
    </div>
@endsection