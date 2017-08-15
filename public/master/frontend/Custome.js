$(document).ready(function() {

  // modal login
  $("#btnLoginModal").click(function() {
    var username = $("#username_modal").val(),
        password = $("#password_modal").val();

    if (username=="" || password=="") {
      alert("Harap lengkapi data login");
    } else {
      $.ajax({
        url: base_url + 'pelanggan/process_modal',
        type: 'POST',
        data: {
          username: username,
          password: password
        },
        success: function(result, status, xhr) {
          if (result=='') {
            location.href = base_url + 'pelanggan';
          } else {
            alert(result);
          }
        },
        error: function(xhr, status, error) {
          alert("Terjadi error, cek di console debugger");
          console.log(xhr);
        }
      });
    }
  });

});
