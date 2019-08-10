<?php
    require_once '../conexion/conexion.php';
    if (isset($_POST["IdUsuario"]))
    {
        $IdUsuario = $_POST["IdUsuario"];
        $TraerUsuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE IdUsuario = '$IdUsuario'");
        $array = mysqli_fetch_array($TraerUsuario);
        echo json_encode($array);
    }