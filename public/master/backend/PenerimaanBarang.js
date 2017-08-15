$(document).ready(function() {
    $('form').on('blur', 'input[required]', validator.checkField);

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        if (!validator.checkAll($(this))) {
            submit = false;
        } else {
          $.ajax({
            url: base_app + 'penerimaan/updateBarang',
            type: 'POST',
            data: {
              kode_pengiriman: $("#kode_pengiriman").val(),
              status: $("#status").val(),
              catatan: $("#catatan").val()
            },
            success: function(result, status, xhr) {
              if (result=='') {
                location.href = base_app + 'penerimaan/barang';
              } else {
                $("#modalMessage").modal('show');
                $("#modalHeaderColor").removeClass('btn-danger').addClass('btn-warning');
                $("#modalTitle").unbind().text('Peringatan, terjadi kesalahan pada saat simpan data');
                $("#modalBody").unbind().text(xhr.responseText);
              }
            },
            error: function(xhr, status, error) {
              $("#modalMessage").modal('show');
              $("#modalHeaderColor").removeClass('btn-warning').addClass('btn-danger');
              $("#modalTitle").unbind().text('Berbahaya, terjadi kesalahan pada proses simpan data');
              $("#modalBody").unbind().text(xhr.responseText);
            }
          });
        }
    });

    $('#tanggal_penerimaan').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_2"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
});
