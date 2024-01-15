<!-- DataTales Example -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <!-- notifikasi data berhasil ditambahkan -->
                <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Kategori <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <!-- button tambah kategori -->
                <a href="<?php echo base_url('user/form_kategori'); ?>"><button class="btn mb-3" style="background-color:#FF1493; color:white;">
                        <i class="fas fa-plus"></i> Tambah Kategori</button></a>

                <!-- tabel kategori -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($kategori as $data) :
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data->nama_kat; ?></td>
                                <td><?= $data->desk_kat; ?></td>
                                <td>
                                    <a href="<?= base_url('user/edit_kategori/') . $data->id_kat ?>"><button type="edit" class="sbtn btn-success"><i class="fas fa-edit"></i></button></a>

                                    <a href="<?= base_url('user/hapus_kategori/') . $data->id_kat ?>"><button type="delete" class="sbtn btn-danger" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/'); ?>vendor/moment/min/moment.min.js">
</script>