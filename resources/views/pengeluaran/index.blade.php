@extends('main')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengeluaran</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ url('pengeluaran/create') }}" data-toggle="modal" data-target="#AddModal">
            Tambah Data
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran ZAIN Farfume</h6>
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
                    {{-- <th>ID pengeluaran</th> --}}
                    <th>Nama Parfum</th>
                    <th>Total Pengeluaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    {{-- <th>ID pengeluaran</th> --}}
                    <th>Nama Parfum</th>
                    <th>Total Pengeluaran</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($pengeluaran as $x)
                <tr>
                    {{-- <td>{{ $x->id }}</td> --}}
                    <td>{{ $x->penjualan->barang->nama_parfum }}</td>
                    <td>{{ $total }}</td>
                    <td class="text-center">
                        <a href="{{ url('pengeluaran/'.$x->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('pengeluaran',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
{{-- <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data pengeluaran</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{url('pengeluaran')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label>ID Parfum</label>
                    <select name="id_parfum" class="form-control">
                        @foreach ($barang as $item)
                        <option value="{{ $item->id }}"> {{ $item->nama_parfum }} </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Jumlah Terjual</label>
                    <input type="number" 
                    name="jumlah_terjual" 
                    value="{{ old('jumlah_terjual') }}" 
                    class="form-control 
                    @error('jumlah_terjual') is-invalid @enderror" autofocus>
                    @error('jumlah_terjual')
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
</div> --}}
{{-- end AddModal --}}


@endsection