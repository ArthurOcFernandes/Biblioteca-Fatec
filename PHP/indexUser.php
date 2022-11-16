<?php

if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['userID']) OR( $_SESSION['tipoUsuario'] != 1)){
    session_destroy();
    header("Location: ../HTML/index.php");
    exit();
}

echo <<<USER
    logado como $_SESSION[name] USUARIO
USER;
