<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-md-2 mb-4">
                <div class="input-group date" id="gabung">
                    <input type="text" name="tahun_beli" id="tahun_beli" class="form-control tahun_beli"
                        required="required" placeholder="Pilih tahun">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Pembelian</th>
                            <th>Penjualan</th>
                            <th>Laba</th>
                        </tr>
                    </thead>
                    <tbody id="laba"></tbody>
                    <tfoot id="labatotal"></tfoot>
                </table>
            </div>
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


<script src="<?= base_url('assets/');?>vendor/moment/min/moment.min.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= base_url('assets/');?>vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js">
</script>

<script>
$('#gabung').datetimepicker({

        format: 'YYYY',
        allowInputToggle: true
    })
    .on('dp.change', function(e) {

        gabungChart();
    });

function gabungChart() {

    var tahun_beli = $('#gabung').data('date');

    $.ajax({
        url: "<?php echo base_url('user/gabung') ?>",
        async: false,
        type: "POST",
        data: {
            "tahun_beli": tahun_beli
        },
        dataType: "JSON",
        success: function(data) {

            var html = '';
            var mytotal = '';
            var total_inv = 0;
            var total_pur = 0;


            for (i = 0; i < data.length; i++) {
                html += '<tr >' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td>' + data[i].month + '</td>' +
                    '<td>' + (parseInt(data[i].total_inv) || 0) + '</td>' +
                    '<td>' + (parseInt(data[i].total_pur) || 0) + '</td>' +
                    '<td>' + (data[i].total_inv - data[i].total_pur) + '</td>' +
                    '</tr>';
            }
            $("#laba").html(html); //pass the data to your tbody


            for (i = 0; i < data.length; i++) {
                total_inv += parseInt(data[i].total_inv) || 0;
                total_pur += parseInt(data[i].total_pur) || 0;
                mytotal = '<tr >' +
                    '<td>#</td>' +
                    '<td>Total</td>' +
                    '<td>' + total_inv + '</td>' +
                    '<td>' + total_pur + '</td>' +
                    '<td>' + (total_inv - total_pur) + '</td>' +
                    '</tr>';
            }
            $("#labatotal").html(mytotal); //pass the data to your tbody
        }
    })
}
</script>