@extends('main')
@section('title', 'Dashboard')


@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            
            {{-- Pemesanan Parfum --}}
            <div class="col-md-12">
                <h3><center>Pemesanan Parfum</center></h3><hr>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-pencil text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Menunggu Acc</div>
                                <div class="stat-digit">{{$parfum_menunggu}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-pencil text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Acc Owner</div>
                                <div class="stat-digit">{{$parfum_acc}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-truck text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Proses Pembelian</div>
                                <div class="stat-digit">{{$parfum_process}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-check text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Diterima Gudang</div>
                                <div class="stat-digit">{{$parfum_diterima}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pemesanan Botol --}}
            <div class="col-md-12">
                <h3><center>Pemesanan Botol</center></h3><hr>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-pencil text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Menunggu Acc</div>
                                <div class="stat-digit">{{$botol_menunggu}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-pencil text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Acc Owner</div>
                                <div class="stat-digit">{{$botol_acc}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-truck text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Proses Pembelian</div>
                                <div class="stat-digit">{{$botol_process}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-check text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Diterima Gudang</div>
                                <div class="stat-digit">{{$botol_diterima}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pengiriman --}}
            <div class="col-md-12">
                <h3><center>Pengiriman</center></h3><hr>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-pencil text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Menunggu Acc</div>
                                <div class="stat-digit">{{$pengiriman_menunggu}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-pencil text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Acc Owner</div>
                                <div class="stat-digit">{{$pengiriman_acc}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-truck text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Proses Pengiriman</div>
                                <div class="stat-digit">{{$pengiriman_process}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-check text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Diterima ReSeller</div>
                                <div class="stat-digit">{{$pengiriman_diterima}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection