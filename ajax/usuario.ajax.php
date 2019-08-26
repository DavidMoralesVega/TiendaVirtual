<?php
    require_once '../conexion/conexion.php';
    // Solicitar Usuario
    if (isset($_POST["IdUsuario"]))
    {
        $IdUsuario = $_POST["IdUsuario"];
        $TraerUsuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE IdUsuario = '$IdUsuario'");
        $array = mysqli_fetch_array($TraerUsuario);
        echo json_encode($array);
    }
    // Cambiar el estado del usuario
    if (isset($_POST["IdUsuarioActivar"]))
    {
        $IdUsuarioActivar = $_POST["IdUsuarioActivar"];
        $EstadoUsuarioActivar = $_POST["EstadoUsuarioActivar"];

        $CambiarEstado = mysqli_query($conexion, "UPDATE usuario SET Estado = '$EstadoUsuarioActivar' WHERE IdUsuario = '$IdUsuarioActivar'");
    }
    // Validar usuario repetido (CedulaIdentidad)
    if (isset($_POST["CedulaIdentidad"]))
    {
        $CI = $_POST["CedulaIdentidad"];
        $FiltroCI = mysqli_query($conexion, "SELECT * FROM usuario WHERE CedulaIdentidad = '$CI'");
        $Usuario = mysqli_fetch_array($FiltroCI);
        echo json_encode($Usuario);
    }