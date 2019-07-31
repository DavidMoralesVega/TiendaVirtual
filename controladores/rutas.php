<?php
    session_start();
    if ($_SESSION["Validar"] == false)
    {
        header('Location: index.php');
    }