$(document).ready(function() {
  tinymce.init({
  selector: '#keterangan',
});

    $('form').on('blur', 'input[required]', validator.checkField);

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        if (!validator.checkAll($(this))) {
            submit = false;
        } else {
          $.ajax({
            url: base_app + 'madu/save',
            type: 'POST',
            data: {
              id_madu: $("#id_madu").val(),
              nama: $("#nama").val(),
              gambar: $("#gambar_nama").val(),
              keterangan: tinyMCE.get('keterangan').getContent()
            },
            success: function(result, status, xhr) {
              if (result=='') {
                location.href = base_app + 'madu';
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

    $('#fileupload').fileupload({
        url: base_url + 'assets/backend/plugins/jQuery-File-Upload-master/server/php/',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $("#gambar_nama").val(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');


    $("#_btnDeleteFile_").on("click", function() {
      $.ajax({
        url: base_app + 'madu/deleteFile',
        type: 'POST',
        data: { id_madu: $("#id_madu").val() },
        success: function(result, status, xhr) {
          if (result=='') {
            location.href = base_app + 'madu/form/' + $("#id_madu").val();
          } else {
            $("#modalMessage").modal('show');
            $("#modalHeaderColor").removeClass('btn-danger').addClass('btn-warning');
            $("#modalTitle").unbind().text('Peringatan, terjadi kesalahan pada saat hapus data');
            $("#modalBody").unbind().text(xhr.responseText);
          }
        },
        error: function(xhr, status, error) {
          $("#modalMessage").modal('show');
          $("#modalHeaderColor").removeClass('btn-warning').addClass('btn-danger');
          $("#modalTitle").unbind().text('Berbahaya, terjadi kesalahan pada proses hapus data');
          $("#modalBody").unbind().text(xhr.responseText);
        }
      });
    });
});
