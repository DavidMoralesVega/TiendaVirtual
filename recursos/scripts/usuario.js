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