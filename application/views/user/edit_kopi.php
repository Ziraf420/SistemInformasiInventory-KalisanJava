<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="x_content">

            <?php foreach ($tampil_kopi as $data) : ?>
                <form action="" method="post" class="form-horizontal form-label-left" novalidate>
                    <input type="hidden" name="id_kopi" id="id_kopi" value="<?= $data->id_kopi; ?>">
                    <div class="row justify-content-center pt-4" post>
                        <div class="col-2">
                            <label for="nama_kopi" class="col-form-label">Nama Kopi</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="nama_kopi" name="nama_kopi" class="form-control" value="<?= $data->nama_kopi; ?>">
                            <?= form_error('nama_kopi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-2">
                        <div class="col-2">
                            <label for="penyimpanan" class="col-form-label">Penyimpanan</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="penyimpanan" name="penyimpanan" class="form-control" value="<?= $data->penyimpanan; ?>">
                            <?= form_error('penyimpanan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-2">
                        <div class="col-2">
                            <label for="stok" class="col-form-label">Banyak Stok</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="stok" name="stok" class="form-control" value="<?= $data->stok; ?>">
                            <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-2">
                        <div class="col-2">
                            <label for="nama_kat" class="col-form-label">Nama Kategori</label>
                        </div>
                        <div class="col-3">
                            <select type="text" name="id_kat" id="id_kat" class="form-control">
                                <?php foreach ($get_kat as $gk) : ?>
                                    <option value="<?= $gk->id_kat; ?>" <?= $data->id_kat == $gk->id_kat ? 'selected' : NULL ?>>
                                        <?= $gk->nama_kat; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_kat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-2">
                        <div class="col-2">
                            <label for="kedaluwarsa" class="col-form-label">Tanggal Kadaluarsa</label>
                        </div>
                        <div class="col-3">
                            <input type="date" id="kedaluwarsa" name="kedaluwarsa" class="form-control" value="<?= $data->kedaluwarsa; ?>">
                            <?= form_error('kedaluwarsa', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-2">
                        <div class="col-2">
                            <label for="h_beli" class="col-form-label">Harga Beli</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="h_beli" name="h_beli" class="form-control" value="<?= $data->h_beli; ?>">
                            <?= form_error('h_beli', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-2">
                        <div class="col-2">
                            <label for="h_jual" class="col-form-label">Harga Jual</label>
                        </div>
                        <div class="col-3">
                            <input type="text" id="h_jual" name="h_jual" class="form-control" value="<?= $data->h_jual; ?>" readonly>
                            <?= form_error('h_jual', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-2">
                        <div class="col-2">
                            <label for="nama_pemasok" class="col-form-label">Nama Pemasok</label>
                        </div>
                        <div class="col-3">
                            <select type="text" name="id_pemasok" id="id_pemasok" class="form-control">
                                <?php foreach ($get_pemasok as $gk) : ?>
                                    <option value="<?= $gk->id_pemasok; ?>" <?= $data->id_pemasok == $gk->id_pemasok ? 'selected' : NULL ?>>
                                        <?= $gk->nama_pemasok; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_pemasok', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-4 pb-4">
                        <div class="col-1">
                            <a href="<?= base_url('user/lihat_kopi') ?>"><button type="button" class="btn btn-danger" name="batal" id="batal">Batal</button></a>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-success" name="submit" id="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#h_beli').keyup(function() {
            var beli = parseInt($('#h_beli').val());

            var a = beli + (beli * 0.11);
            var b = a * 0.2;
            var h_jual = a + b;
            $('#h_jual').val(h_jual);
        });
    });
</script>