@extends('main')
@section('title', 'Bibit Parfum')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Bibit Parfum</strong>
                    </div>
                    @if (Auth::user()->name == 'gudang')
                    <div class="pull-right">
                        <a href="{{ route('barang.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div>
                    @endif

                    @if (Auth::user()->name =='owner')
                    <div class="pull-right">
                        <a href="{{ url('/barang/cetak') }}" class="btn btn-success btn-sm">
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
                                <th>ID Parfum</th>
                                <th>Nama Bibit Parfum</th>
                                <th>Stock / ml</th>
                                <th>Minimal Stock / ml</th>
                                <th>Harga Penjualan</th>
                                <th>Harga Reseller</th>
                                @if (Auth::user()->name == 'gudang')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $x)
                            <tr>
                                <td>{{ $x->id }}</td>
                                <td>{{ $x->nama_parfum }}</td>
                                <td>{{ $x->jumlah_parfum }} ml</td>
                                <td>{{ $x->min_stock }} ml</td>
                                <td>Rp. {{ format_uang($x->harga_penjualan) }}</td>
                                <td>Rp. {{ format_uang($x->harga_reseller) }}</td>
                                @if (Auth::user()->name == 'gudang')
                                <td class="text-center">
                                    <a href="{{ url('barang/'.$x->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <form action="{{ url('barang',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                @endif
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