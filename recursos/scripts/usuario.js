function Mayus(elemento) {
    elemento.value = elemento.value.toUpperCase();
}

function GenerateUser() {
    var Codigo = "";
    var Nombre = document.getElementById("UINombre").value;
    var InicialNombre = Nombre.substr(0, 1);

    Codigo += InicialNombre;

    var Apellidos = document.getElementById("UIApellidos").value;

    array = Apellidos.split(" "),
        total = array.length,
        InicialApellidos = "";

    for (var i = 0; i < total; InicialApellidos += array[i][0], i++);

    Codigo += InicialApellidos;

    var CedulaIdentidad = document.getElementById("UICedulaIdentidad").value;

    Codigo += '-' + CedulaIdentidad;

    document.getElementById("UIUser").value = Codigo;
}

$(".TablaUsuarios tbody").on("click", "button#btnEditarUsuario", function() {

    var IdUsuario = $(this).attr("IdUsuario");

    var Datos = new FormData();
    Datos.append("IdUsuario", IdUsuario);

    $.ajax({
        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: Datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {

            // IdUsuario

            $("#UAIdUsuario").val(response["IdUsuario"]);

            $("#UANombre").val(response["Nombre"]);
            $("#UAApellidos").val(response["Apellidos"]);
            $("#UACedulaIdentidad").val(response["CedulaIdentidad"]);
            $("#UAUser").val(response["User"]);

            // Obsoleto
            // $("#UARol").html(response["Rol"]);

            if (response["Rol"] == 'A') {
                $('#UARol option[value="A"]').attr("selected", true);
            } else {
                $('#UARol option[value="A"]').attr("selected", false);
            }

            if (response["Rol"] == 'V') {
                $('#UARol option[value="V"]').attr("selected", true);
            } else {
                $('#UARol option[value="V"]').attr("selected", false);
            }
        }
    })

})

$(".TablaUsuarios tbody").on("click", "button#btnEliminarUsuario", function() {

    var IdUsuario = $(this).attr("IdUsuario");

    var Datos = new FormData();
    Datos.append("IdUsuario", IdUsuario);

    $.ajax({
        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: Datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            $("#UEIdUsuario").val(response["IdUsuario"]);
            var mensaje = '¿Esta seguro de eliminar a :' + response["Nombre"] + ' ' + response["Apellidos"] + '?';
            $("#MensajeEliminar").html(mensaje);
        }
    })
});
$(".btnActivar").click(function() {
    var IdUsuario = $(this).attr("IdUsuario");
    var EstadoUsuario = $(this).attr("EstadoUsuario");

    var Datos = new FormData();
    Datos.append("IdUsuarioActivar", IdUsuario);
    Datos.append("EstadoUsuarioActivar", EstadoUsuario);

    $.ajax({
        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: Datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response);
        }
    })

    if (EstadoUsuario == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('PASIVO');
        $(this).attr('EstadoUsuario', 1);
    } else {
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('ACTIVO');
        $(this).attr('EstadoUsuario', 0);
    }

})

// Validar usuario repetido (CedulaIdentidad)
function ValidarCI() {

    $(".alert").remove();

    var CI = $("#UICedulaIdentidad").val();

    var DatosValidar = new FormData();
    DatosValidar.append("CedulaIdentidad", CI);

    $.ajax({
        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: DatosValidar,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            if (response) {
                $("#UICedulaIdentidad").parent().after('<div class="alert alert-danger">' +
                    'Este usuario ya existe en la base de datos' +
                    '</div>');
                $("#UICedulaIdentidad").val("");
            }
        }
    })
}