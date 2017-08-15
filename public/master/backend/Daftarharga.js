$(document).ready(function() {
	var harga = $("#harga");

	if (harga.val()=='' || harga.val()==null) {
		harga.bind("keyup", function(e) {
			var resultFormatter = IDRFormatter($(this).val(), 'Rp. ');
			$(this).val(resultFormatter);
		});
	} else {
		var resultFormatter = IDRFormatter(harga.val(), 'Rp. ');
		harga.val(resultFormatter);

		harga.bind("keyup", function(e) {
			var changeResultFormatter = IDRFormatter($(this).val(), 'Rp. ');
			$(this).val(changeResultFormatter);
		});
	}

    $('form').on('blur', 'input[required]', validator.checkField);

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        if (!validator.checkAll($(this))) {
            submit = false;
        } else {
          $.ajax({
            url: base_app + 'daftarharga/save',
            type: 'POST',
            data: {
              id_daftarhargaitem: $("#id_daftarhargaitem").val(),
              harga: $("#harga").val(),
              id_madu: $("#id_madu").val(),
              id_kemasan: $("#id_kemasan").val()
            },
            success: function(result, status, xhr) {
              if (result=='') {
                location.href = base_app + 'daftarharga';
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
