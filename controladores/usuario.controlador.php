<?php
    require_once '../conexion/conexion.php';

    // INSERTAR USUARIO
    if (isset($_POST["UINombre"])){
        $Nombre = $_POST["UINombre"];
        $Apellidos = $_POST["UIApellidos"];
        $CI = $_POST["UICedulaIdentidad"];
        $User = $_POST["UIUser"];
        $Rol = $_POST["UIRol"];

        $encriptar = crypt($CI, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $InsertarUsuario = mysqli_query($conexion, "INSERT INTO `usuario` (`Nombre`, `Apellidos`, `CedulaIdentidad`, `User`, `Password`, `Rol`) VALUES ('$Nombre', '$Apellidos', '$CI', '$User', '$encriptar', '$Rol')");

        if (!$InsertarUsuario) {
            echo "Usuario no registrado";
        }
        else{
            header('Location: ../usuario.php');
        }
    }
    // ACTUALIZAR DATOS DEL USUARIO
    if (isset($_POST["UAIdUsuario"]))
    {
        $UAIdUsuario = $_POST["UAIdUsuario"];
        $UANombre = $_POST["UANombre"];
        $UAApellidos = $_POST["UAApellidos"];
        $UACedulaIdentidad = $_POST["UACedulaIdentidad"];
        $UARol = $_POST["UARol"];

        $ActualizarUsuario = mysqli_query($conexion, "UPDATE usuario SET Nombre = '$UANombre', Apellidos = '$UAApellidos', CedulaIdentidad = '$UACedulaIdentidad', Rol = '$UARol' WHERE IdUsuario = '$UAIdUsuario'");

        if (!$ActualizarUsuario)
        {
            echo 'LA ACTUALIZACION DE USUARIO FALLO EXITOSAMENTE';
        }
        else
        {
            header('Location: ../usuario.php');
        }
    }
    // ELIMINAR USUARIO
    if (isset($_POST["UEIdUsuario"]))
    {
        $UEIdUsuario = $_POST["UEIdUsuario"];
        $EliminarUsuario = mysqli_query($conexion, "DELETE FROM usuario WHERE IdUsuario = '$UEIdUsuario'");
        if (!$EliminarUsuario)
        {
            echo 'ERROR AL ELIMINAR USUARIO';
        }
        else
        {
            header('Location: ../usuario.php');
        }
    }