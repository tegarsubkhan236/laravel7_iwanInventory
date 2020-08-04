<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">ZAIN Parfume</a>
            <a class="navbar-brand hidden" href="{{ route('home') }}">ZAIN</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i> Dashboard </a>
                </li>

                @if (Auth::user()->name == 'owner')
                <h3 class="menu-title">Person</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/pelanggan' }}"> <i class="menu-icon fa fa-files-o"></i> Mitra Toko </a>
                </li>
                <li>
                    <a href="{{ '/supplier' }}"> <i class="menu-icon fa fa-files-o"></i> Supplier </a>
                </li>
                <h3 class="menu-title">Pengiriman</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/pengiriman' }}"> <i class="menu-icon fa fa-files-o"></i> Pengiriman </a>
                </li>
                <h3 class="menu-title">Pemesanan</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/pembelian' }}"> <i class="menu-icon fa fa-files-o"></i> Bibit Parfum </a>
                </li>
                <li>
                    <a href="{{ '/pembelian_botol' }}"> <i class="menu-icon fa fa-files-o"></i> Botol </a>
                </li>
                <h3 class="menu-title">Pembelian</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/final_pembelian' }}"> <i class="menu-icon fa fa-files-o"></i> Bibit Parfum </a>
                </li>
                <li>
                    <a href="{{ '/final_pembelian_botol' }}"> <i class="menu-icon fa fa-files-o"></i> Botol </a>
                </li>
                <h3 class="menu-title">Stocks</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/barang' }}"> <i class="menu-icon fa fa-files-o"></i> Bibit Parfum </a>
                </li>
                <li>
                    <a href="{{ '/botol' }}"> <i class="menu-icon fa fa-files-o"></i> Botol </a>
                </li>
                <h3 class="menu-title">Sell</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/penjualan_parfum' }}"> <i class="menu-icon fa fa-files-o"></i> Parfum</a>
                </li>
                <li>
                    <a href="{{ '/penjualan' }}"> <i class="menu-icon fa fa-files-o"></i> Parfum Dengan Botol</a>
                </li>
                @endif

                @if (Auth::user()->name == 'gudang')
                <h3 class="menu-title">Person</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/pelanggan' }}"> <i class="menu-icon fa fa-files-o"></i> Mitra Toko </a>
                </li>
                <li>
                    <a href="{{ '/supplier' }}"> <i class="menu-icon fa fa-files-o"></i> Supplier </a>
                </li>
                <h3 class="menu-title">Stocks</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/barang' }}"> <i class="menu-icon fa fa-files-o"></i> Bibit Parfum </a>
                </li>
                <li>
                    <a href="{{ '/botol' }}"> <i class="menu-icon fa fa-files-o"></i> Botol </a>
                </li>
                <h3 class="menu-title">Pemesanan</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/pembelian' }}"> <i class="menu-icon fa fa-files-o"></i> Bibit Parfum </a>
                </li>
                <li>
                    <a href="{{ '/pembelian_botol' }}"> <i class="menu-icon fa fa-files-o"></i> Botol </a>
                </li>
                <h3 class="menu-title">Pembelian</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/final_pembelian' }}"> <i class="menu-icon fa fa-files-o"></i> Bibit Parfum </a>
                </li>
                <li>
                    <a href="{{ '/final_pembelian_botol' }}"> <i class="menu-icon fa fa-files-o"></i> Botol </a>
                </li>
                <h3 class="menu-title">Pengiriman</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/pengiriman/create' }}"> <i class="menu-icon fa fa-files-o"></i> Permintaan </a>
                </li>
                <li>
                    <a href="{{ '/pengiriman' }}"> <i class="menu-icon fa fa-files-o"></i> Pengiriman </a>
                </li>
                @endif

                @if (Auth::user()->name == 'penjualan')
                <h3 class="menu-title">Stocks</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/barang' }}"> <i class="menu-icon fa fa-files-o"></i> Bibit Parfum </a>
                </li>
                <li>
                    <a href="{{ '/botol' }}"> <i class="menu-icon fa fa-files-o"></i> Botol </a>
                </li>
                <h3 class="menu-title">Sell</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ '/penjualan_parfum' }}"> <i class="menu-icon fa fa-files-o"></i> Parfum</a>
                </li>
                <li>
                    <a href="{{ '/penjualan' }}"> <i class="menu-icon fa fa-files-o"></i> Parfum Dengan Botol</a>
                </li>
                @endif

            </ul>
        </div>
    </nav>
</aside>