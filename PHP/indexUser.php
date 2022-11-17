<?php
require_once("./Classes/Usuario.php");

if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['userID']) OR( $_SESSION['tipoUsuario'] != 1)){
    session_destroy();
    header("Location: ../HTML/index.php");
    exit();
}

$user = new Usuario($_SESSION['name'], $_SESSION['username'], $_SESSION['userID']);

$nome = $user->getNome();
echo <<<MSG
    <h1>logado como $nome</h1>
MSG;
