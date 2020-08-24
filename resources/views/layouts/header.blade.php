<header id="header" class="header">
    <div class="header-menu">
        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
                <?php
                $stock_parfum = \DB::select("SELECT * from barangs where jumlah_parfum < min_stock");
                ?>
                <?php
                $stock_botol = \DB::select("SELECT * from botols where jumlah_botol < min_stock");
                ?>

                @if (Auth::user()->name == 'gudang' || Auth::user()->name == 'owner')
                
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">{{ count($stock_parfum) }}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">Parfum's Notification</p>
                        @foreach ($stock_parfum as $x)
                            <a class="dropdown-item media bg-flat-color-4" href="{{ '/pembelian' }}">
                                <i class="fa fa-info"></i>
                                <p>Parfum {{ $x->nama_parfum }}, Memiliki Stock {{ $x->jumlah_parfum }}. Segera Lakukan Pemesanan</p>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell-o"></i>
                        <span class="count bg-danger">{{ count($stock_botol) }}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">Botol's Notification</p>
                        @foreach ($stock_botol as $x)
                            <a class="dropdown-item media bg-flat-color-4" href="{{ '/pembelian_botol' }}">
                                <i class="fa fa-info"></i>
                                <p>Botol {{ $x->nama_botol }}, Memiliki Stock {{ $x->jumlah_botol }}. Segera Lakukan Pemesanan</p>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif

                @if (Auth::user()->name == 'penjualan')
                
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">{{ count($stock_parfum) }}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">Parfum's Notification</p>
                        @foreach ($stock_parfum as $x)
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Parfum {{ $x->nama_parfum }}, Memiliki Stock {{ $x->jumlah_parfum }}. Segera Lakukan Pemesanan</p>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell-o"></i>
                        <span class="count bg-danger">{{ count($stock_botol) }}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">Botol's Notification</p>
                        @foreach ($stock_botol as $x)
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Botol {{ $x->nama_botol }}, Memiliki Stock {{ $x->jumlah_botol }}. Segera Lakukan Pemesanan</p>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                    {{-- <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}" alt="User Avatar"> --}}
                </a>
                <div class="user-menu dropdown-menu">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                    </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
            </div>

        </div>
    </div>

</header><!-- Header -->