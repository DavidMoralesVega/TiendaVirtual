<?php
    require_once '../conexion/conexion.php';

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