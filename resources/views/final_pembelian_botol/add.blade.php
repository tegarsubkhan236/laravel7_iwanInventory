@extends('main')
@section('title', 'Pembelian Botol')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Pemesanan Botol</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('final_pembelian_botol') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
            <form action="{{url('final_pembelian_botol')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label>No Pemesanan</label>
                    <select name="pemesanan_id" class="form-control">
                        @foreach ($pemesanan as $item)
                        <option value="{{ $item->id }}|{{ $item->botol->id }}|{{ $item->jumlah }}">BL-BTL{{ $item->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>harga</label>
                    <input  name="harga" type="number" class="form-control">
                </div>

                <div class="form-group">
                    <label>jumlah</label>
                    <input  name="jumlah" type="number" class="form-control">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" cols="20" rows="5" class="form-control"></textarea>
                </div>

                <button class="btn btn-success" type="submit">Save</button>
        </form>
        </div>
    </div>
</div>
</div>

</div>
</div>
@endsection

