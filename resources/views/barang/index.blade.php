@extends('main')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Bibit Parfum</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('barang/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Barang
        </a>
    </div>
<a href="{{url('home')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan Persediaan Stok Barang</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Parfum ZAIN Farfume</h6>
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
                    <th>ID Parfum</th>
                    <th>Nama Bibit Parfum</th>
                    <th>Jumlah / ml</th>
                    <th>Harga Pembelian</th>
                    <th>Harga Penjualan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $x)
                <tr>
                    <td>{{ $x->id }}</td>
                    <td>{{ $x->nama_parfum }}</td>
                    <td>{{ $x->jumlah_parfum }} ml</td>
                    <td>Rp. {{  format_uang($x->harga_pembelian) }}</td>
                    {{-- <td>Rp. {{ $x->pembelian->harga_beli }}</td> --}}
                    <td>Rp. {{ format_uang($x->harga_penjualan) }}</td>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bibit Parfum</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('barang')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Bibit Parfum</label>
                    <input type="text" 
                    name="nama_parfum" 
                    value="{{ old('nama_parfum') }}" 
                    class="form-control 
                    @error('nama_parfum') is-invalid @enderror" autofocus>
                    @error('nama_parfum')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jumlah / ml</label>
                    <input type="number" 
                    name="jumlah_parfum" 
                    value="0" 
                    class="form-control 
                    @error('jumlah_parfum') is-invalid @enderror" autofocus readonly>
                    @error('jumlah_parfum')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga Pembelian</label>
                    <input 
                    type="number" 
                    name="harga_pembelian"
                    value="{{ old('harga_pembelian') }}"
                    class="form-control 
                    @error('harga_pembelian') is-invalid @enderror" 
                    autofocus>
                    @error('harga_pembelian')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga Penjualan</label>
                    <input 
                    type="number" 
                    name="harga_penjualan" 
                    value="{{ old('harga_penjualan') }}" 
                    class="form-control 
                    @error('harga_penjualan') is-invalid @enderror" 
                    autofocus
                    >
                    @error('harga_penjualan')
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