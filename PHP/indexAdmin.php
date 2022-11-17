<?php


if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['userID']) or ($_SESSION['tipoUsuario'] != 3)) {
    session_destroy();
    header("Location: ../HTML/index.php");
    exit();
}
$user = new Administrador($_SESSION['name'], $_SESSION['username'], $_SESSION['userID']);

$nome = $user->getNome();
echo "<h1>logado como $nome</h1>";
