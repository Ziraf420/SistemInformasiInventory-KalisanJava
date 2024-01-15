<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <form action="<?php echo base_url() . 'user/form_penjualan'; ?>" method="post" class="form-horizontal form-label-left" novalidate>

                        <div class="row justify-content-center pt-4" post>
                            <div class="col-2">
                                <label for="nama_pembeli" class="col-form-label">Nama Pembeli</label>
                            </div>
                            <div class="col-3">
                                <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-control">
                                <?= form_error('nama_pembeli', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row justify-content-center pt-2 mb-4">
                            <div class="col-2">
                                <label for="tgl_beli" class="col-form-label">Tanggal Penjualan</label>
                            </div>
                            <div class="col-3">
                                <input type="date" id="tgl_beli" name="tgl_beli" class="form-control">
                                <span class=" input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <?= form_error('tgl_beli', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>



                        <table id="penjualan" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Kopi yang dijual</th>
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
                                        <b>Total Keseluruhan :</b>
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
                                <a href="<?php echo base_url('user/lihat_penjualan') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                                <button id='addpenjualan' class="btn btn-info" type="button"><span class="fa fa-plus"></span>
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
    const addpenjualan = document.querySelector("#addpenjualan");
    var penjualan = $('#penjualan').DataTable({
        "paging": false,
        "ordering": false,
        "info": false,
        "searching": false,
    });


    var counter = 1;

    addpenjualan.onclick = function(event) {
        penjualan.row.add([
            '<select required="required" style="width:100%" class="form-control nama_kopi" id="nama_kopi' +
            counter + '" name="nama_kopi[]" data-stok="#stok' + counter + '" data-nama_kat="#id_kat' +
            counter + '" data-h_jual="#h_jual' + counter +
            '"><option selected="true" value="" disabled ></option><?php foreach ($get_med as $gm) { ?><option value="<?php echo $gm; ?>"><?php echo $gm; ?></option><?php  } ?></select>',
            '<input id="stok' + counter + '" name="stok[]" class="form-control stok" readonly >',
            '<input id="id_kat' + counter + '" name="id_kat[]" class="form-control" readonly>',
            '<input id="h_jual' + counter +
            '" name="h_jual[]" class="form-control h_jual" readonly>',
            '<input type="number" id="banyak' + counter +
            '" name="banyak[]" class="form-control banyak" required="required">',
            '<input id="subtotal' + counter +
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

        counter++;
    }

    $('#penjualan').on("click", "#removeproduk", function() {
        console.log($(this).parent());
        penjualan.row($(this).parents('tr')).remove().draw(false);
        updateTotal();
    });


    $('#penjualan').on('change', '.nama_kopi', function() {
        var $select = $(this);
        var nama_kopi = $select.val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user/product') ?>",
            dataType: "JSON",
            data: {
                nama_kopi: nama_kopi
            },
            cache: false,
            success: function(data) {
                $.each(data, function(nama_kopi, stok, nama_kat, h_jual) {
                    $($select.data('stok')).val(data.stok);
                    $($select.data('nama_kat')).val(data.nama_kat);
                    $($select.data('h_jual')).val(data.h_jual);
                });
            }
        });

    });

    $('#penjualan').on('change', '.banyak', function() {
        updateSubtotalp();
    });

    function updateSubtotalp() {

        $(".banyak").each(function() {
            var $row = $(this).closest('tr');
            var unitStock = parseInt($row.find('.stok').val());
            var unitCount = parseInt($row.find('.banyak').val());


            if (unitCount > unitStock) {
                $row.find('.banyak').val(unitStock);
                alert("PERINGATAN ! PENJUALAN MELEBIHI SISA STOK");
                updateSubtotalp();
            } else if (unitCount < 0) {
                $row.find('.banyak').val(0);
                updateSubtotalp();
            } else {
                var Sub = parseInt(($row.find('.h_jual').val()) * unitCount);
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