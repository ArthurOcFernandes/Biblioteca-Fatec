<?php
if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['userID']) OR( $_SESSION['tipoUsuario'] != 2)){
    session_destroy();
    header("Location: ../HTML/index.php");
    exit();
}

echo <<<BIB
    logado como $_SESSION[name] BIBLIOTECARIO
BIB;
