@extends('main')
@section('title', 'Penjualan Dengan Botol')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Penjualan Dengan Botol</strong>
                    </div>
                    <div class="pull-right">
                        @if (Auth::user()->name == "penjualan")
                        <a href="{{ route('penjualan.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
                        </a>
                        @endif

                        @if (Auth::user()->name =='owner')
                        <a href="{{ url('/penjualan/cetak') }}" class="btn btn-success btn-sm">
                            Cetak Laporan
                        </a>
                        @endif
                    </div>
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
                    <th>Botol</th>
                    <th>Harga Botol</th>
                    <th>Total Harga</th>
                    @if (Auth::user()->name == 'penjualan')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $x)
                <tr>
                    <td>TR{{ $x->id }}</td>
                    <td>{{ $x->created_at->format('d-m-Y') }}</td>
                    <td>{{ $x->barang->nama_parfum }}</td>
                    <td>Rp. {{ $x->barang->harga_penjualan }}</td>
                    <td>{{ $x->jumlah }} ml</td>
                    <td>{{ $x->botol->nama_botol }}</td>
                    <td>Rp. {{ $x->botol->harga_penjualan }}</td>
                    <td>Rp. {{  $total_penjualan = $x->jumlah * $x->barang->harga_penjualan + $x->botol->harga_penjualan}}</td>
                    @if (Auth::user()->name == 'penjualan')
                    <td class="text-center">
                        <a href="{{ url('penjualan/'.$x->id.'/edit') }}" class="btn btn-primary  btn-sm">
                            Cetak Nota
                        </a>
                        {{-- <form action="{{ url('penjualan',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
                            @method("delete")
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form> --}}
                    </td>
                    @endif
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <td colspan="7">Total Penjualan</td>
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