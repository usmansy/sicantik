// Loader
var loader = document.getElementById("preloader");
window.addEventListener("load", function () {
  loader.style.display = "none";
});

// Captcha
$(document).ready(function () {
  $('#captch_form').on('submit', function (event) {
    event.preventDefault();
    if ($('#captcha_code').val() == '') {
      // alert('Masukkan Kode Captcha');
      swal({
        title: "Captcha Kosong!!!",
        text: "Mohon masukkan kode captcha",
        icon: "warning",
        button: "OK"
      });
      $('#cari').attr('disabled', 'disabled');
      return false;
    } else {
      // alert('Form has been validate with Captcha Code');
      // $('#captch_form')[0].reset();
      // $('#captcha_image').attr('src', 'conf/image.php');
      document.getElementById("captch_form").submit();
    }
  });

  $('#captcha_code').on('blur', function () {
    var code = $('#captcha_code').val();

    if (code == '') {
      // alert('Masukkan Kode Captcha');
      swal({
        title: "Captcha Kosong!!!",
        text: "Mohon masukkan kode captcha",
        icon: "warning",
        button: "OK"
      });
      $('#cari').attr('disabled', 'disabled');
    } else {
      $.ajax({
        url: "conf/check_code.php",
        method: "GET",
        data: {
          code: code
        },
        success: function (data) {
          if (data == 'success') {
            $('#cari').attr('disabled', false);
          } else {
            $('#cari').attr('disabled', 'disabled');
            // alert('Kode Salah');
            swal({
              title: "Kode Captcha Salah!!!",
              text: "Mohon masukkan kode captcha yang benar",
              icon: "error",
              button: "OK"
            });
          }
        }
      });
    }
  });

});