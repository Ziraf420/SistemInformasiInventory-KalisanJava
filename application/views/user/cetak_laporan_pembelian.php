<div class="container">
    <div class="text-center">
        <h1>Kedai Kopi Kalisan Java</h1>
        <h3><?= $judul; ?></h3>
        <h6><?= $subjudul; ?></h6>
    </div>

    <hr class="sidebar-divider">

    <div class="row table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>No Referensi</th>
                <th>Nama Pemasok</th>
                <th>Nama Kopi</th>
                <th>Tanggal Transaksi</th>
                <th>Banyak</th>
                <th>Total Keseluruhan</th>
            </tr>

            <?php
            $subtotal = 0;
            foreach ($datafilter as $data) : ?>
                <tr>
                    <td><?= $data->ref; ?></td>
                    <td><?= $data->nama_pemasok; ?></td>
                    <td><?= $data->nama_kopi; ?></td>
                    <td><?= date('j F Y', strtotime($data->tgl_beli)); ?></td>
                    <td><?= $data->banyak; ?></td>
                    <td>Rp <?= number_format($data->subtotal); ?></td>
                </tr>
            <?php endforeach; ?>
            <?php
            foreach ($datafilter as $data) :
                $total2[] = $data->grandtotal;
                $total3 = array_sum($total2); ?>
            <?php endforeach; ?>
            <tr>
                <td style="text-align:center; vertical-align: middle" colspan="5"><b>TOTAL</b></b></td>
                <td>
                    <b>Rp <?php echo number_format($total3) ?></b>
                </td>
            </tr>
        </table>
    </div>

    <!-- this row will not appear when printing -->
    <div class="row m-3">
        <div class="col-xs-12">
            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i>
                Cetak</button>

        </div>
    </div>

</div>