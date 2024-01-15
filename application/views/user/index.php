<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Header Keterangan -->
    <div class="row tile_count justify-content-center" style="text-align:center;">
        <div class=" col-md-2 col-sm-4 col-xs-6 tile_stats_count p-1 m-1" style="font-size:20px;">
            <div class="card border shadow h-100 py-4">
                <span class="count_top"><i class="fa fa-coffee"></i> Total Kopi</span>
                <div class="count" style="text-align: ;"><?php echo $sumKopi ?></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count p-1 m-1" style="font-size:20px;">
            <div class="card border shadow h-100 py-4">
                <span class="count_top"><i class="fa fa-fw fa-shopping-cart"></i> Total Transaksi Pembelian</span>
                <div class="count" style="text-align: ;"><?php echo number_format($sumBeli) ?></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count p-1 m-1" style="font-size:20px;">
            <div class="card border shadow h-100 py-4">
                <span class="count_top"><i class="fa fa-dollar-sign"></i> Total Transaksi Penjualan</span>
                <div class="count" style="text-align: ;"><?php echo number_format($sumJual) ?></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count p-1 m-1" style="font-size:20px;">
            <div class="card border shadow h-100 py-4">
                <span class="count_top"><i class="fa fa-fw fa-folder-open"></i> Total Kategori</span>
                <div class="count" style="text-align: ;"><?php echo $sumKat ?></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count p-1 m-1" style="font-size:20px;">
            <div class="card border shadow h-100 py-4">
                <span class="count_top"><i class="fa fa-users"></i> Total Pemasok</span>
                <div class="count" style="text-align: ;"><?php echo $sumPemasok ?></div>
            </div>
        </div>
    </div>
    <!-- /Header Keterangan -->

    <!-- Body -->
    <div class="row pt-5 justify-content-center">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('user/form_kopi') ?>" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center" style="color:#130F30">
                            <div class="col mr-2">
                                <div class="text-lg-start font-weight-bold text-uppercase mb-1" style="color:#130F30">
                                    Data Kopi
                                </div>
                                <div class="text-sm-start text-gray-80"> Tambah Data Kopi</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-coffee fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('user/form_kategori') ?>" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center" style="color:#130F30">
                            <div class="col mr-2">
                                <div class="text-lg-start font-weight-bold text-uppercase mb-1" style="color:#130F30">
                                    Data Kategori</div>
                                <div class="text-sm-start text-gray-80">Tambah Data kategori</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-folder-open fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('user/form_pemasok') ?>" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center" style="color:#130F30">
                            <div class="col mr-2">
                                <div class="text-lg-start font-weight-bold text-uppercase mb-1" style="color:#130F30">
                                    Data Pemasok
                                </div>
                                <div class="text-sm-start text-gray-80">Tambah Data Pemasok</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users fa-2x "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- BARIS KE 2 -->
    <div class="row justify-content-center">
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('user/tabel_kedaluwarsa') ?>" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg-start font-weight-bold text-primary text-uppercase mb-1">
                                    Kedaluwarsa</div>
                                <div class="text-sm-start text-gray-80">Menampilkan kopi kedaluwarsa</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-exclamation-triangle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('user/tabel_stok') ?>" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-lg-start font-weight-bold text-primary text-uppercase mb-1">Habis
                                </div>
                                <div class="text-sm-start text-gray-80">Menampilkan kopi akan habis</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('user/form_penjualan') ?>" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center" style="color:#130F30">
                            <div class="col mr-2">
                                <div class="text-lg-start font-weight-bold text-uppercase mb-1" style="color:#130F30">
                                    Penjualan</div>
                                <div class="text-sm-start text-gray-80">Tambah Data Penjualan</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('user/form_pembelian') ?>" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center" style="color:#130F30">
                            <div class="col mr-2">
                                <div class="text-lg-start font-weight-bold text-uppercase mb-1" style="color:#130F30">
                                    Pembelian</div>
                                <div class="text-sm-start text-gray-80">Tambah Data Pembelian</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('laporan_controller/laporan_penjualan') ?>" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center" style="color:#130F30">
                            <div class="col mr-2">
                                <div class="text-lg-start font-weight-bold text-uppercase mb-1" style="color:#130F30">
                                    Laporan</div>
                                <div class="text-sm-start text-gray-80">Lihat Laporan Keuangan</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script src="<?= base_url('assets/'); ?>vendor/moment/min/moment.min.js">
</script>