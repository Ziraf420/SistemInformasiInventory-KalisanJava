<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion font-weight-bold" style="background: #130F30;" id="accordionSidebar">
    <!-- Sidebar - LOGO-->
    <div class="d-flex justify-content-center">
        <!-- logo info -->
        <div class=" logo_pic" style="margin: 10px;">
            <img src="<?php echo base_url('assets/img/profile/logoo.png') ?>" alt="..." class="img-fluid" alt="Responsive image"></a>
        </div>
    </div>
    <div class="profile">
        <!-- <div class="font-weight-bold text-center" style="color: white;"><span style="font-size: 20px;">
                Kalisan Java
            </span></div> -->
    </div>


    <!-- Divider Garis -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Beranda -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/index') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Menu Kopi -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKopi" aria-expanded="true" aria-controls="collapseKopi">
            <i class="fa fa-fw fa-coffee"></i>
            <span>Data Kopi</span>
        </a>
        <div id="collapseKopi" class="collapse" aria-labelledby="headingKopi" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_kopi') ?>">Tambah Kopi</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_kopi') ?>">Lihat Kopi</a>
                <a class="collapse-item" href="<?= base_url('user/tabel_kedaluwarsa') ?>">Kedaluwarsa</a>
                <a class="collapse-item" href="<?= base_url('user/tabel_stok') ?>">Habis</a>
            </div>
        </div>
    </li>

    <!-- Menu Jual Beli -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTransaksi">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span>Data Jual Beli</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/lihat_penjualan') ?>">Transaksi Penjualan</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_pembelian') ?>">Transaksi Pembelian</a>
            </div>
        </div>
    </li>

    <!-- Menu Kategori -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategori" aria-expanded="true" aria-controls="collapseKategori">
            <i class="fa fa-fw fa-folder-open"></i>
            <span>Kategori Kopi</span>
        </a>
        <div id="collapseKategori" class="collapse" aria-labelledby="headingKategori" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_kategori') ?>">Tambah Kategori</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_kategori') ?>">Lihat Kategori</a>
            </div>
        </div>
    </li>

    <!-- Menu Pemasok -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePemasok" aria-expanded="true" aria-controls="collapsePemasok">
            <i class="fa fa-fw fa-users"></i>
            <span>Pemasok Kopi</span>
        </a>
        <div id="collapsePemasok" class="collapse" aria-labelledby="headingPemasok" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_pemasok') ?>">Tambah Pemasok</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_pemasok') ?>">Lihat Pemasok</a>
            </div>
        </div>
    </li>


    <!-- Menu LAPORAN -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan Keuangan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('laporan_controller/laporan_penjualan') ?>">Laporan
                    Penjualan</a>
                <a class="collapse-item" href="<?= base_url('laporan_controller/laporan_pembelian') ?>"> Laporan
                    Pembelian</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->