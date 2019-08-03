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