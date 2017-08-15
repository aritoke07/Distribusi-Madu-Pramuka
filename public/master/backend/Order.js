$(document).ready(function() {
    $('form').on('blur', 'input[required]', validator.checkField);

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        if (!validator.checkAll($(this))) {
            submit = false;
        } else {
          $.ajax({
            url: base_app + 'order/save',
            type: 'POST',
            data: {
              kode_order: $("#kode_order").val(),
              status: $("#status").val()
            },
            success: function(result, status, xhr) {
              if (result=='') {
                location.href = base_app + 'order/pelanggan';
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
});
