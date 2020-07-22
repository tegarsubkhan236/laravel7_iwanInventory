@extends('main')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data penjualan</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('penjualan/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Data
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data penjualan ZAIN Farfume</h6>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No Transaksi</th>
                    <th>Tanggal Penjualan</th>
                    <th>Nama Pelanggan</th>
                    <th>Bibit Parfum</th>
                    <th>Botol</th>
                    {{-- <th>Harga</th> --}}
                    <th>Jumlah / ml</th>
                    {{-- <th>Total Harga</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $x)
                <tr>
                    <td>TR{{ $x->id }}</td>
                    <td>{{ $x->created_at->format('d-m-Y') }}</td>
                    <td>{{ $x->pelanggan->nama }}</td>
                    <td>{{ $x->barang->nama_parfum }}</td>
                    <td>{{ $x->botol->id }}</td>
                    {{-- <td>Rp. {{ $x->barang->harga_penjualan }}</td> --}}
                    <td>{{ $x->jumlah }} ml</td>
                    {{-- <td>Rp. {{  $total_penjualan = $x->jumlah * $x->barang->harga_penjualan }}</td> --}}
                    <td class="text-center">
                        <a href="{{ url('penjualan/'.$x->id.'/edit') }}" class="btn btn-primary  btn-sm">
                            {{-- <i class="fa fa-info"></i> --}}Detail
                        </a>
                        <form action="{{ url('penjualan',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
            <h5 class="modal-title" id="exampleModalLabel">Penjualan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('penjualan')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <select name="pelanggan_id" class="form-control">
                        @foreach ($pelanggan as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->nama }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Bibit Parfum</label>
                    <select name="barang_id" class="form-control">
                        @foreach ($barang as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama_parfum }} [{{ $item->harga_penjualan }}] </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Botol</label>
                    <select name="botol_id" class="form-control">
                        {{-- <option value='null'> ==Tidak Menggunakan Botol== </option> --}}
                        @foreach ($botol as $item)
                        <option value="{{ $item->id }}|1"> {{ $item->nama_botol }} [{{ $item->harga_penjualan }}] </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Jumlah / ml</label>
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