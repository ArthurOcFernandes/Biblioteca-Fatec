<?php

require_once ("./Classes/Bibliotecario.php");
require_once ("./Classes/Usuario.php");

if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['userID']) OR( $_SESSION['tipoUsuario'] != 2)){
    session_destroy();
    header("Location: ../HTML/index.php");
    exit();
}

$bibliotecario = new Bibliotecario($_SESSION['name'], $_SESSION['username'], $_SESSION['userID']);

echo <<<BIB
    logado como $_SESSION[name] BIBLIOTECARIO
BIB;


$bibliotecario->emprestaLivro(new Livro('Harry Potter e o Enigma do Principe', 'J K Rowland', 1),
    new Usuario("Arthur", "capy", 1));