@extends('main')
@section('title', 'Pembelian Bibit Parfum')

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Pemesanan Bibit Parfum</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('final_pembelian') }}" class="btn btn-secondary btn-sm">
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
            <form action="{{url('final_pembelian')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label>No Pemesanan</label>
                    <select name="pemesanan_id" class="form-control">
                        @foreach ($pemesanan as $item)
                        <option value="{{ $item->id }}|{{ $item->barang->id }}|{{ $item->jumlah }}">{{ $item->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" cols="30" rows="10" class="form-control"></textarea>
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

