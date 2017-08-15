$(document).ready(function() {
    $("#jumlah").keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    $("#status").change(function() {
      var value = $(this).val();

      if (value=="2") {
        $("#jumlah").attr("readonly", true);
        $("#jumlah").val(0);
      } else {
        $("#jumlah").attr("readonly", false);
        $("#jumlah").val("");
      }
    });

    $("#id_madu").change(function() {
      var value = $(this).val();
      if (value!="") {
        $.post(base_app + 'stok/getDetailKemasan', { id_madu: value}, function(result, status, xhr) {
          $("#id_kemasan").html(result);
        });
      } else {

      }
    });

    $("#id_kemasan").change(function() {
      var value = $(this).val(),
          id_madu = $("#id_madu").val();

      if (value!="" && id_madu!="") {
        $.ajax({
          url: base_app + 'stok/getDetailHarga',
          type: 'POST',
          dataType: 'json',
          data: { id_madu: id_madu, id_kemasan: value},
          success: function(result, status, xhr) {
            var resultFormatter = IDRFormatter(result.harga, 'Rp. ');
        		$("#harga").val(resultFormatter);

            $("#id_daftarhargaitem").val(result.id_daftarhargaitem);
          },
          error: function(xhr, status, error) {
            alert(status);
          }
        });
      } else {

      }
    });

    $('form').on('blur', 'input[required]', validator.checkField);

    $('#form_create').submit(function(e) {
        e.preventDefault();
        var submit = true;

        if (!validator.checkAll($(this))) {
            submit = false;
        } else {
          $.ajax({
            url: base_app + 'stok/insert',
            type: 'POST',
            data: {
              id_stok: $("#id_stok").val(),
              status: $("#status").val(),
              jumlah: $("#jumlah").val(),
              id_daftarhargaitem: $("#id_daftarhargaitem").val()
            },
            success: function(result, status, xhr) {
              if (result=='') {
                location.href = base_app + 'stok';
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

    $('#form_edit').submit(function(e) {
        e.preventDefault();
        var submit = true;

        if (!validator.checkAll($(this))) {
            submit = false;
        } else {
          $.ajax({
            url: base_app + 'stok/update',
            type: 'POST',
            data: {
              id_stok: $("#id_stok").val(),
              status: $("#status").val(),
              jumlah: $("#jumlah").val(),
              id_daftarhargaitem: $("#id_daftarhargaitem").val()
            },
            success: function(result, status, xhr) {
              if (result=='') {
                location.href = base_app + 'stok';
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
