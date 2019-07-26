<?php
    $Usuario = $_POST["user"];
    $Password = $_POST["pass"];

    require_once '../conexion/conexion.php';
    
    $TraerUsuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE User = '$Usuario'");
    
    $Fila = mysqli_fetch_array($TraerUsuario);

    $encriptar = crypt($Password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

    if ($Fila["User"] == $Usuario && $Fila["Password"] == $encriptar) {
        header('Location: ../panel.php');
    }
    else {
        header('Location: ../index.php');
    }
