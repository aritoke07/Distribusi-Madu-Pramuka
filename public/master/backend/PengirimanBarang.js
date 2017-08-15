$(document).ready(function() {

  $('#tanggal_pengiriman').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });

  $(".jumlah").keyup(function () {
          this.value = this.value.replace(/[^0-9\.]/g,'');
      });

  $("#kode_order").change(function(event) {
    var value = $(this).val();

    if (value!='') {
      $.post(base_app + 'pengiriman/getDataOrder', {kode_order: value}, function(data, textStatus, xhr) {
        $("#resultDataOrder").html(data);
      });
    } else{
      $("#resultDataOrder").html('0');
    };
  });

  $(".id_stok").change(function(event) {
    var value = $(this).val();

    if (value!='') {
      $.post(base_app + 'pengiriman/getJumlahStok', {id_stok: value}, function(data, textStatus, xhr) {
        $(".jumlah_stok").val(data);
      });
    } else {
      $(".jumlah_stok").val('');
    };
  });

  $(".jumlah").keyup(function() {
    var valStok = $(".jumlah_stok").val(),
        valJumlah = $(".jumlah").val();

    if (valStok!='' && valJumlah>valStok) {
      alert("Jumlah pengiriman melebihi jumlah stok");
    };
  });

    $("#status").change(function(event) {
      var value = $(this).val();

      if (value==3) {
        $(":checkbox").removeAttr('disabled');
      } else {
        $(":checkbox").attr('disabled', true);
      }
    });

  $(':checkbox').change(function(event) {
    var id = $(this).attr('id');

    if ($(this).prop('checked')==true) {
      $('#jumlahretur_'+id).removeAttr('readonly');

      $('#jumlahretur_'+id).keyup(function(event) {
        var jumlah_retur = $(this).val(),
            jumlah = $('#jumlah_'+id).val();

        if (jumlah_retur>jumlah) {
          alert('Jumlah retur melebihi jumalh yang dikirim');
        }
      });
    } else {
      $('#jumlahretur_'+id).attr('readonly', true);
      $('#jumlahretur_'+id).val('');
    }
  });

  var xLoop = 1;
  $("#btnAddRow").click(function() {
    var valueLoop = xLoop++;

    $("#tableDetailOne tr:last").after('<tr><td><select name="id_stok[]" class="form-control col-md-7 col-xs-12 id_stok_child" required="required" id="id_stok[]"><option value="">- Pilih -</option></select></td><td><input type="text" class="form-control jumlah_child" id="jumlah[]" name="jumlah[]"></td><td><button type="button" class="btn btn-danger btn-sm" id="btnRemoveRow_'+valueLoop+'">Hapus</button></td></tr>');

    $("#btnRemoveRow_"+valueLoop).on("click", function() {
        $(this).parent().parent().remove();
      });

    $(".jumlah_child").keyup(function () {
          this.value = this.value.replace(/[^0-9\.]/g,'');
      });

    $(".id_stok_child").change(function(event) {
    var value = $(this).val();

    if (value!='') {
      $.post(base_app + 'pengiriman/getJumlahStok', {id_stok: value}, function(data, textStatus, xhr) {
        $(".jumlah_stok_child").val(data);
      });
    } else {
      $(".jumlah_stok_child").val('');
    };
  });

      $.get(base_app + 'pengiriman/getDataStok', function(result, status, xhr) {
        $(".id_stok_child").html(result);
      });
  });

});