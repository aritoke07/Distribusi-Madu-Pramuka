$(function() {
	$(':input[type="number"]').change(function(event) {
		var inputIdNumber = $(this).attr('id');
		var value = $('#'+inputIdNumber).val();

		$.ajax({
			url: base_url + 'cart/update',
			type: 'POST',
			dataType: 'json',
			data: {rowid: inputIdNumber, qty: value},
			success: function(result, status, xhr) {
				$(':text[name="'+inputIdNumber+'"]').val(result.subtotal);
				$('#total_price').val(result.total);
			},
			error: function(xhr, status, error) {
				alert("Error, check console");
				console.log(xhr);
			}
		});
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

    $("#btnCheckOut").click(function(event) {
    	var gambar_nama = $("#gambar_nama").val();
    	
    	if (gambar_nama!='') {
    		$.ajax({
	    		url: base_url + 'pelanggan/checkout',
	    		type: 'POST',
	    		data: {filename: gambar_nama},
	    		success: function(result, status, xhr) {
	    			if (result=='') {
	    				location.href = base_url + 'pelanggan/list_order';
	    			} else{
	    				alert(result);
	    			};
	    		},
	    		error: function(xhr, status, error) {
	    			alert("Error, check console");
	    			console.log(xhr);
	    		}
	    	});
    	} else {
    		alert("Mohon upload gambar pembayaran terlebih dahulu");
    	};
    });

	$("#btnSavePassword").click(function(event) {
		var password_1 = $("#password_1").val(),
			password_2 = $("#password_2").val();

		if (password_1!='' && password_2!='') {
			$.ajax({
				url: base_url + 'pelanggan/update_password',
				type: 'POST',
				data: {password_1: password_1, password_2: password_2},
				success: function(result, status, xhr) {
					alert(result);
				},
				error: function(xhr, status, error) {
					alert("Error, check console");
					console.log(xhr);
				}
			});
		} else{};
	});

	$("#btnUpdatePelanggan").click(function(event) {
		var nama = $("#nama").val(),
			alamat = $("#alamat").val(),
			telp = $("#telp").val(),
			handphone = $("#handphone").val(),
			email = $("#email").val();

		if (nama!='' || alamat!='' || telp!='' || handphone!='' || email!='') {
			$.ajax({
				url: base_url + 'pelanggan/update',
				type: 'POST',
				data: {
					nama: nama,
					alamat: alamat,
					telp: telp,
					handphone: handphone,
					email: email
				},
				success: function(result, status, xhr) {
					alert(result);
				},
				error: function(xhr, status, error) {
					alert("Error, check console");
					console.log(xhr);
				}
			});
		};
	});
});