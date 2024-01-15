<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>

        <div class="card mt-3 mr-3 ml-3">
            <h5 class="card-header">Cetak Laporan Pertanggal</h5>
            <div class="card-body">
                <form action="<?php echo base_url('Laporan_controller/cetak_laporan_penjualan');?>" method="POST"
                    target="_BLANK">

                    <input type="hidden" name="nilaifilter" value="1">

                    <div class="row">
                        <div class="col form-group">
                            <label for="tanggalawal" class="font-weight-bold">Mulai Tanggal :</label>
                            <input type="date" id="tanggalawal" class="form-control" name="tanggalawal" required>
                        </div>
                        <div class="col form-group">
                            <label for="tanggalakhir" class="font-weight-bold">Sampai Tanggal :</label>
                            <input type="date" id="tanggalakhir" class="form-control" name="tanggalakhir" required>
                        </div>
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-success ">Cetak
                        Laporan</button>
                </form>
            </div>
        </div>

        <div class="card mt-3 mr-3 ml-3">
            <h5 class="card-header">Cetak Laporan Perbulan</h5>
            <div class="card-body">
                <form action="<?php echo base_url('laporan_controller/cetak_laporan_penjualan');?>" method="POST"
                    target="_BLANK">

                    <input type="hidden" name="nilaifilter" value="2">
                    <div class="form-group">
                        <label for="bulanawal" class="font-weight-bold">Pilih Bulan Awal :</label>
                        <select name="bulanawal" id="bulanawal" class="form-control" required>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bulanawal" class="font-weight-bold">Pilih Bulan Akhir :</label>
                        <select name="bulanakhir" id="bulanakhir" class="form-control" required>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>

                    <div class="col form-group">
                        <label for="tanggalakhir" class="font-weight-bold">Pilih Tahun </label>
                        <select name="tahun1" id="tahun1" required>
                            <?php foreach ($tahun as $data) : ?>
                            <option value="<?= $data->tahun ?>"><?= $data->tahun ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" id="submit" name="submit" class="btn btn-success ">Cetak
                        Laporan</button>
            </div>
            </form>
        </div>

        <div class="card mt-3 mr-3 ml-3">
            <h5 class="card-header">Cetak Laporan Pertahun</h5>
            <div class="card-body">
                <form action="<?php echo base_url('laporan_controller/cetak_laporan_penjualan'); ?>" method="POST"
                    target="_BLANK">

                    <input type="hidden" name="nilaifilter" value="3">
                    <div class="row">
                        <div class="col form-group">
                            <label for="tahun2" class="font-weight-bold">Pilih Tahun </label>
                            <select name="tahun2" id="tahun2" required>
                                <?php foreach ($tahun as $data) : ?>
                                <option value="<?= $data->tahun ?>"><?= $data->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-success ">Cetak
                            Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>