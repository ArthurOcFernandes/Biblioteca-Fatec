<?php

include_once("bib_session.php");

if(!isset($_POST)){
    header("Location: ./indexBibliotecario.php");
    exit();
}

$bibliotecario = new Bibliotecario($_SESSION['name'], $_SESSION['username'], $_SESSION['userID']);


$conn = database::connect('localhost', 'root', '');

$livro = database::selectLivro($_POST['titulo'], $conn);
$usuario = database::selectUsuario($_POST['user'], $conn);

$conn->close();

if ($usuario != null and $livro != null){
    $bibliotecario->emprestaLivro($livro, $usuario);
    header("Location: ./indexBibliotecario.php");
} else throw new RuntimeException("Usuario ou livro inexistentes");

