<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title1; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="alert alert-danger" role="alert">
                    List Kopi dengan tanggal Kedaluwarsa <strong>Kurang dari 15 Hari</strong>!
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kopi</th>
                            <th>Penyimpanan</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Pemasok</th>
                            <th>Kedaluwarsa</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($table_almostexp as $data) :
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data->nama_kopi; ?></td>
                                <td><?= $data->penyimpanan; ?></td>
                                <td><?= $data->id_kat; ?></td>
                                <td><?= $data->stok; ?></td>
                                <td><?= $data->id_pemasok; ?></td>
                                <td><?= date('j F Y', strtotime($data->kedaluwarsa)); ?></td>
                                <td>Rp<?= number_format($data->h_jual); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title2; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kopi</th>
                            <th>Penyimpanan</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Pemasok</th>
                            <th>Kedaluwarsa</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($table_exp as $data) :
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data->nama_kopi; ?></td>
                                <td><?= $data->penyimpanan; ?></td>
                                <td><?= $data->nama_kat; ?></td>
                                <td><?= $data->stok; ?></td>
                                <td><?= $data->nama_pemasok; ?></td>
                                <td><?= date('j F Y', strtotime($data->kedaluwarsa)); ?></td>
                                <td>Rp<?= number_format($data->h_jual); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>