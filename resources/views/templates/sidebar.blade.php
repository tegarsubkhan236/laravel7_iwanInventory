<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
        
        </div>
        <div class="sidebar-brand-text mx-3">ZAIN Farfume</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('pelanggan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Pelanggan</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ url('supplier') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Supplier</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('barang') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Stock Bibit Parfum</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('botol') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Stock Botol</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('pembelian') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Pembelian Bibit Parfum</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('pembelian_botol') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Pembelian Botol</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('penjualan') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Penjualan</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder"></i>
        <span>Penjualan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Penjualan Components:</h6>
            <a class="collapse-item" href="{{ url('pengeluaran') }}">Total Pengeluaran</a>
            <a class="collapse-item" href="{{ url('penjualan') }}">Penjualan</a>
        </div>
        </div>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pembelian</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pembelian Components:</h6>
            <a class="collapse-item" href="#">Total Pemasukan</a>
            <a class="collapse-item" href="{{ url('pembelian') }}">Pembelian</a>
            </div>
        </div>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pemesanan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pemesanan Components:</h6>
                <a class="collapse-item" href="login.html">Pemesanan</a>
                <a class="collapse-item" href="register.html">Detil Pemesanan</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->