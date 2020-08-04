@extends('main')
@section('title', 'Data Mitra Toko')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Mitra Toko</strong>
                    </div>
                    @if (Auth::user()->name == 'owner')
                    <div class="pull-right">
                        <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>add
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
                    <th>ID pelanggan</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    @if (Auth::user()->name == 'owner')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $x)
                <tr>
                    <td>PL{{ $x->id }}</td>
                    <td>{{ $x->nama }}</td>
                    <td>{{ $x->alamat }}</td>
                    <td>{{ $x->no_telp }}</td>
                    @if (Auth::user()->name == 'owner')
                    <td class="text-center">
                        <a href="{{ url('pelanggan/'.$x->id.'/edit') }}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fa fa-info"></i>
                        </a>
                        <form action="{{ url('pelanggan',$x->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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