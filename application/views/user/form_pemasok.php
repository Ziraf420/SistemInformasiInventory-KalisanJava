<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="x_content">

            <form action="<?= base_url("user/form_pemasok") ?>" method="post" class="form-horizontal form-label-left" novalidate>

                <div class="row justify-content-center pt-4" post>
                    <div class="col-2">
                        <label for="nama_pemasok" class="col-form-label">Nama Pemasok</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nama_pemasok" name="nama_pemasok" class="form-control" value="<?= set_value('nama_pemasok') ?>">
                        <?= form_error('nama_pemasok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="alamat_pemasok" class="col-form-label">Alamat</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="alamat_pemasok" name="alamat_pemasok" class="form-control" value="<?= set_value('alamat_pemasok') ?>">
                        <?= form_error('alamat_pemasok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-2">
                    <div class="col-2">
                        <label for="telepon" class="col-form-label">Nomor Telepon</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="telepon_pemasok" name="telepon_pemasok" class="form-control" value="<?= set_value('telepon_pemasok') ?>">
                        <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="row justify-content-center pt-4 pb-4">
                    <div class="col-1">
                        <a href="<?= base_url('user/lihat_pemasok') ?>"><button type="button" class="btn btn-danger" name="batal" id="batal">Batal</button></a>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-success" name="submit" id="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf',
            ]
        });
    });
</script>