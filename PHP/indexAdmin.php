<?php


if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['userID']) or ($_SESSION['tipoUsuario'] != 3)) {
    session_destroy();
    header("Location: ../HTML/index.php");
    exit();
}

echo <<<ADM
    logado como $_SESSION[name] ADM
ADM;
