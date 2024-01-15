<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">


                    <form action="<?php echo base_url() . 'user/form_pembelian'; ?>" method="post" class="form-horizontal form-label-left" novalidate>

                        <div class="row justify-content-center pt-2">
                            <div class="col-2">
                                <label for="id_pemasok" class="col-form-label">Nama Pemasok</label>
                            </div>
                            <div class="col-3">
                                <select name="id_pemasok" id="id_pemasok" class="select2_single form-control id_pemasok" tabindex="-1" required="required">
                                    <option selected="true" value="" disabled></option>
                                    <?php foreach ($get_pemasok as $gs) { ?>
                                        <option value="<?php echo $gs->id_pemasok; ?>"><?php echo $gs->nama_pemasok; ?></option>
                                    <?php  } ?>
                                </select>
                                <?= form_error('nama_pemasok', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>


                        <div class="row justify-content-center pt-2 mb-4">
                            <div class="col-2">
                                <label for="tgl_beli" class="col-form-label">Tanggal Pembelian</label>
                            </div>
                            <div class="col-3">
                                <input type="date" id="tgl_beli" name="tgl_beli" class="form-control">
                                <span class=" input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <?= form_error('tgl_beli', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>



                        <table id="pembelian" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Kopi yang dibeli</th>
                                    <th style="text-align: center">Sisa Stok</th>
                                    <th style="text-align: center">Kategori</th>
                                    <th style="text-align: center">Harga</th>
                                    <th style="text-align: center">Banyak</th>

                                    <th style="text-align: center">Subtotal</th>
                                    <th style="text-align: center">Aksi</th>

                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <td style="text-align:right; vertical-align: middle" colspan="5">
                                        <b>Total Keseluruhan</b>
                                    </td>
                                    <td>
                                        <input id="grandtotal" name="grandtotal" type="text" class="form-control grandtotal" readonly>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo base_url('user/lihat_pembelian') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                <button id='addpembelian' class="btn btn-info" type="button"><span class="fa fa-plus"></span>
                                    Tambah Produk</button>
                                <button id="send" type="submit" class="btn btn-success">Simpan</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<script type="text/javascript">
    const addpembelian = document.querySelector("#addpembelian");
    var pembelian = $('#pembelian').DataTable({
        "paging": false,
        "ordering": false,
        "info": false,
        "searching": false,
    });

    $(document).on('change', '.id_pemasok', function() {

        var id_pemasok = $('.id_pemasok').val();

        $.ajax({
            url: "<?php echo base_url('user/getmedbysupplier') ?>",
            method: "POST",
            data: {
                id_pemasok: id_pemasok
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                var html = '';
                var i;
                html += '<option selected="true" value="" disabled >Pilih Kopi</option>';
                for (i = 0; i < data.length; i++) {
                    // console.log(data[i]);
                    html += '<option>' + data[i].nama_kopi + '</option>';
                }
                $('.nama_kopi').html(html);

            }
        });
    });

    var count = 1;

    addpembelian.onclick = function(event) {
        pembelian.row.add([
            '<select required="required" style="width:100%;" class="form-control nama_kopi" id="nama_kopi' +
            count + '" name="nama_kopi[]" data-stok="#stok' + count + '" data-id_kat="#id_kat' + count +
            '" data-h_beli="#h_beli' + count +
            '"><option selected="true" value="" disabled >Pilih Kopi</option></select>',
            '<input id="stok' + count + '" name="stok[]" class="form-control stok" readonly >',
            '<input id="id_kat' + count + '" name="id_kat[]" class="form-control id_kat" readonly>',
            '<input id="h_beli' + count +
            '" name="h_beli[]" class="form-control h_beli" readonly>',
            '<input type="number" id="banyak' + count +
            '" name="banyak[]" class="form-control banyak" required="required">',
            '<input id="subtotal' + count +
            '" name="subtotal[]" class="form-control subtotal" readonly>',
            '<button id="removeproduk" class="btn btn-danger btn-sm" type="button"><span class="fa fa-trash"></span> Hapus</button>',
        ]).draw(false);

        var myOpt = [];
        $("select").each(function() {
            myOpt.push($(this).val());
        });
        $("select").each(function() {
            $(this).find("option").prop('hidden', false);
            var sel = $(this);
            $.each(myOpt, function(key, value) {
                if ((value != "") && (value != sel.val())) {
                    sel.find("option").filter('[value="' + value + '"]').prop('hidden', true);
                }
            });
        });

        count++;
    }

    $('#pembelian').on("click", "#removeproduk", function() {
        console.log($(this).parent());
        pembelian.row($(this).parents('tr')).remove().draw(false);
        updateTotal();
    });


    $('#pembelian').on('change', '.nama_kopi', function() {
        var $select = $(this);
        var nama_kopi = $select.val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user/product3') ?>",
            dataType: "JSON",
            data: {
                nama_kopi: nama_kopi
            },
            cache: false,
            success: function(data) {
                $.each(data, function(nama_kopi, stok, nama_kat, h_beli) {
                    // console.log(data.id_kat);
                    $($select.data('stok')).val(data.stok);
                    $($select.data('id_kat')).val(data.nama_kat);
                    $($select.data('h_beli')).val(data.h_beli);
                });
            }
        });

    });

    $('#pembelian').on('change', '.banyak', function() {
        updateSubtotalp();
    });

    function updateSubtotalp() {


        $(".banyak").each(function() {
            var $row = $(this).closest('tr');
            var unitStock = parseInt($row.find('.stok').val());
            var unitCount = parseInt($row.find('.banyak').val());

            if (unitCount < 0) {
                $row.find('.banyak').val(0);
                updateSubtotalp();

            } else {
                var Sub = parseInt(($row.find('.h_beli').val()) * unitCount);
                $row.find('.subtotal').val(Sub);
                updateTotal();
            }
        });
    }

    function updateTotal() {
        var grandtotal = 0;
        $('.subtotal').each(function() {
            grandtotal += parseInt($(this).val());
        });
        $('#grandtotal').val(grandtotal);
    }
</script>