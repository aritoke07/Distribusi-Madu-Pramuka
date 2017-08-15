$(document).ready(function() {
    var tingkat = $("#tingkat");

    if (tingkat.val()=="") {
      $("#id_kedai").hide();
    } else if (tingkat.val()!="" && tingkat.val()!="2") {
      $("#id_kedai").hide();
    }

    tingkat.change(function() {
      var tingkatValue = $(this).val();

      if (tingkatValue=="2") {
        $("#id_kedai").show();
        $("#id_kedai").attr("required", true);
      } else {
        $("#id_kedai").hide();
      }
    });

    $('form').on('blur', 'input[required]', validator.checkField);

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        if (!validator.checkAll($(this))) {
            submit = false;
        } else {
          $.ajax({
            url: base_app + 'pengguna/save',
            type: 'POST',
            data: {
              username: $("#username").val(),
              password: $("#password").val(),
              nama: $("#nama").val(),
              tingkat: $("#tingkat").val(),
              id_kedai: $("#id_kedai").val()
            },
            success: function(result, status, xhr) {
              if (result=='') {
                location.href = base_app + 'pengguna';
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
