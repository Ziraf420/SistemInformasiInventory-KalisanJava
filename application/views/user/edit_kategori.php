<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="x_content">
            <form action="" method="post" class="form-horizontal form-label-left" novalidate>
                <input type="hidden" name="id_kat" value="<?= $kategori['id_kat']; ?>">
                <div class="row justify-content-center pt-4" post>
                    <div class="col-2">
                        <label for="nama_kategori" class="col-form-label">Nama Kategori</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control"
                            value="<?= $kategori['nama_kat']; ?>">
                        <?= form_error('nama_kategori', '<small class="text-danger pl-3">' ,'</small>'); ?>
                    </div>

                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                    </div>
                    <div class="col-3">
                        <input id="deskripsi" name="deskripsi" class="form-control"
                            value="<?= $kategori['desk_kat']; ?>">
                        <?= form_error('deskripsi', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>

                <div class=" row justify-content-center pt-4 pb-4">
                    <div class="col-1">
                        <a href="<?php echo base_url('user/lihat_kategori'); ?>"><button class="btn btn-danger"
                                type="button" name="batal" id="batal">Batal</button></a>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-success" name="submit" id="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>