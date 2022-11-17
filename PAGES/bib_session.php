<?php


require_once("../PHP/Classes/Bibliotecario.php");
require_once("../PHP/Classes/Usuario.php");

if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['userID']) or ($_SESSION['tipoUsuario'] != 2)) {
    session_destroy();
    header("Location: ../PAGES/index.php");
    exit();
}

