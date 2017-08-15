$(document).ready(function() {
    $('form').on('blur', 'input[required]', validator.checkField);

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        if (!validator.checkAll($(this))) {
            submit = false;
        } else {
          $.ajax({
            url: base_app + 'gudang/save',
            type: 'POST',
            data: {
              id_gudang: $("#id_gudang").val(),
              nama: $("#nama").val(),
              alamat: $("#alamat").val(),
              telp: $("#telp").val()
            },
            success: function(result, status, xhr) {
              if (result=='') {
                location.href = base_app + 'gudang';
              } else {
                $("#modalMessage").modal('show');
                $("#modalHeaderColor").removeClass('btn-danger').addClass('btn-warning');
                $("#modalTitle").unbind().text('Peringatan, terjadi kesalahan pada saat simpan data');
                $("#modalBody").unbind().text(result);
              }
            },
            error: function(xhr, status, error) {
              $("#modalMessage").modal('show');
              $("#modalHeaderColor").removeClass('btn-warning').addClass('btn-danger');
              $("#modalTitle").unbind().text('Berbahaya, terjadi kesalahan pada proses simpan data');
              $("#modalBody").unbind().text(error);
            }
          });
        }
    });
});
