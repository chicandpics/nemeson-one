
$(function () {
$('form').on('submit', function (e) {

console.log("envia formulario");

      e.preventDefault();
      var nombre = $("#nombre").val();
      var apellidos = $('#apellido').val();
      var telefono = $('#telefono').val();
       var email = $('#email').val();
      var consulta = $("#consulta").val();
      $.ajax({
        type: 'post',
        url: 'email.php',
        data: {nombre:nombre,apellidos:apellidos,telefono:telefono,email:email,consulta:consulta},

        success: function (data) {;
                    console.log(data);
                  }
      });
    });
    });
