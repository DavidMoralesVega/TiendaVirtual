<?php
    $Usuario = $_POST["user"];
    $Password = $_POST["pass"];

    require_once '../conexion/conexion.php';
    
    $TraerUsuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE User = '$Usuario'");
    
    $Fila = mysqli_fetch_array($TraerUsuario);

    $encriptar = crypt($Password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

    if ($Fila["User"] == $Usuario && $Fila["Password"] == $encriptar && $Fila["Estado"] == 1) {
        
        session_start();
        $_SESSION["Validar"] = true;

        $_SESSION["IdUsuario"] = $Fila["IdUsuario"];
        $_SESSION["Nombre"] = $Fila["Nombre"];
        $_SESSION["Apellidos"] = $Fila["Apellidos"];
        $_SESSION["CedulaIdentidad"] = $Fila["CedulaIdentidad"];
        $_SESSION["User"] = $Fila["User"];
        $_SESSION["Password"] = $Fila["Password"];
        $_SESSION["Fecha"] = $Fila["Fecha"];
        $_SESSION["Rol"] = $Fila["Rol"];
        $_SESSION["Estado"] = $Fila["Estado"];     
        
        header('Location: ../panel.php');
    }
    else {
        header('Location: ../index.php');
    }
