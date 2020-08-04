@extends('main')
@section('title', 'Penjualan Parfum')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Penjualan Parfum</strong>
                    </div>
                    <div class="pull-right">
                        @if (Auth::user()->name == "penjualan")
                        <a href="{{ route('penjualan_parfum.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
                        </a>
                        @endif
                    </div>
                    @if (Auth::user()->name =='owner')
                    <div class="pull-right">
                        <a href="{{ url('/penjualan_parfum/cetak') }}" class="btn btn-success btn-sm">
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
                    <table class="table table-bordered" id="bootstrap-data-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Tanggal Penjualan</th>
                                <th>Bibit Parfum</th>
                                <th>Harga Bibit Parfum</th>
                                <th>Jumlah / ml</th>
                                <th>Total Harga</th>
                                @if (Auth::user()->name == 'penjualan')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $x)
                            <tr>
                                <td>TR_PRFM{{ $x->id }}</td>
                                <td>{{ $x->created_at->format('d-m-Y') }}</td>
                                <td>{{ $x->barang->nama_parfum }}</td>
                                <td>Rp. {{ $x->barang->harga_penjualan }}</td>
                                <td>{{ $x->jumlah }} ml</td>
                                <td>Rp. {{  $total_penjualan = $x->jumlah * $x->barang->harga_penjualan}}</td>
                                @if (Auth::user()->name == 'penjualan')
                                <td class="text-center">
                                    <a href="{{ url('penjualan_parfum/'.$x->id.'/edit') }}" class="btn btn-primary  btn-sm">
                                        Cetak Nota
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="5">Total Penjualan Parfum</td>
                                    <td>Rp. {{$total}}</td>
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>
</div>
</div>
@endsection