@extends('main')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pembelian Botol</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('pembelian_botol/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Data
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pembelian ZAIN Farfume</h6>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
        <div class="table-responsive">
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No_pembelian</th>
                        <th>Tanggal Pembelian</th>
                        <th>Nama Supplier</th>
                        <th>Botol</th>
                        {{-- <th>Harga Beli</th> --}}
                        <th>Jumlah</th>
                        {{-- <th>Total Harga</th> --}}
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
                        {{-- <td>Rp. {{ format_uang($x->barang->harga_pembelian) }}</td> --}}
                        <td>{{ $x->jumlah }}</td>
                        {{-- <td>Rp. {{  format_uang($total_pembelian = $x->jumlah * $x->barang->harga_pembelian) }}</td> --}}
                        <td class="text-center">
                            <a href="{{ url('pembelian_botol/'.$x->id.'/edit') }}" class="btn btn-primary btn-sm">
                                Detail
                            </a>
                            <form action="{{ url('pembelian_botol',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
                                @method("delete")
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
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

<!-- add Modal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembelian Botol</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('pembelian_botol')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Supplier</label>
                    <select name="supplier_id" class="form-control">
                        @foreach ($supplier as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->nama }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Botol</label>
                    <select name="botol_id" class="form-control">
                        @foreach ($botol as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama_botol }} [Rp. {{ $item->harga_pembelian }}]  </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" 
                    name="jumlah" 
                    value="{{ old('jumlah') }}" 
                    class="form-control 
                    @error('jumlah') is-invalid @enderror" autofocus>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

        </div>

        <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>

    </div>
    </div>
</div>
{{-- end AddModal --}}


@endsection