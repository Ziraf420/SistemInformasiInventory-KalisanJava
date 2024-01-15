<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="x_content">


            <form action="" method="post" class="form-horizontal form-label-left" novalidate>

                <div class="row justify-content-center pt-4" post>
                    <div class="col-2">
                        <label for="nama_kopi" class="col-form-label">Nama Kopi</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nama_kopi" name="nama_kopi" class="form-control" value="<?= set_value('nama_kopi') ?>">
                        <?= form_error('nama_kopi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="penyimpanan" class="col-form-label">Tempat Penyimpanan</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="penyimpanan" name="penyimpanan" class="form-control" value="<?= set_value('penyimpanan') ?>">
                        <?= form_error('penyimpanan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="stok" class="col-form-label">Banyak Stok (sachet)</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="stok" name="stok" class="form-control" value="<?= set_value('stok') ?>" data-validate-minmax="0,1000">
                        <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="nama_kat" class="col-form-label">Nama Kategori</label>
                    </div>
                    <div class="col-3">

                        <select name="id_kat" id="id_kat" class="select2_single form-control" tabindex="-1" required="required">
                            <option selected="true" value="" disabled></option>
                            <?php foreach ($get_kat as $gk) { ?>
                                <option value="<?php echo $gk->id_kat; ?>"><?php echo $gk->nama_kat; ?></option>
                            <?php  } ?>
                        </select>
                        <?= form_error('id_kat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>



                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="kedaluwarsa" class="col-form-label">Tanggal Kedaluwarsa</label>
                    </div>
                    <div class="col-3">
                        <input type="date" id="kedaluwarsa" name="kedaluwarsa" class="form-control" value="<?= set_value('kedaluwarsa') ?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <?= form_error('kedaluwarsa', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="harga_beli" class="col-form-label">Harga Beli (Rp)</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="harga_beli" name="harga_beli" class="form-control" value="<?= set_value('harga_beli') ?>" data-validate-minmax="10,1000000">
                        <?= form_error('harga_beli', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="harga_jual" class="col-form-label">Harga Jual (Rp)</label>
                    </div>
                    <div class="col-3" class="hasil">
                        <input type="text" id="harga_jual" name="harga_jual" class="form-control" value="<?= set_value('harga_jual') ?>" data-validate-minmax="10,1000000">
                        <?= form_error('harga_jual', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="nama_pemasok" class="col-form-label">Nama Pemasok</label>
                    </div>
                    <div class="col-3">
                        <select name="id_pemasok" id="id_pemasok" class="select2_single form-control" tabindex="-1" required="required">
                            <option selected="true" value="" disabled></option>
                            <?php foreach ($get_pemasok as $gp) { ?>
                                <option value="<?php echo $gp->id_pemasok; ?>"><?php echo $gp->nama_pemasok; ?></option>
                            <?php  } ?>
                        </select>
                        <?= form_error('id_pemasok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-4 pb-4">
                    <div class="col-1">
                        <a href="<?php echo base_url('user/lihat_kopi'); ?>"><button type="button" class="btn btn-danger" name="batal" id="batal">Batal</button></a>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-success" name="submit" id="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#harga_beli').keyup(function() {
            var beli = parseInt($('#harga_beli').val());

            var a = beli + (beli * 0.11);
            var b = a * 0.2;
            var h_jual = a + b;
            $('#harga_jual').val(h_jual);
        });
    });
</script>