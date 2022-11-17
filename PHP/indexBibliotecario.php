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

$conn = database::connect('localhost', 'root', '');

$livros = database::selectLivrosEmprestados($conn);
echo "<h2>Livros Emprestados:</h2>";
foreach ($livros as $row){
    echo <<<HTML
        
          <div class="book-list">
            <div class="book-list-item">
              <img class="book-list-item-img" src="../IMG/321.jpg" alt="">
              <p class="book-list-item-title">$row[titulo] - Autor: $row[autor]</p>
              <p>Emprestado para: $row[usuario]</p>
            </div>
          </div>
        
HTML;

}


database::close($conn);
