<?php
require_once("./Classes/Usuario.php");
require_once ("./Classes/database.php");

if(!isset($_SESSION)) session_start();

if(!isset($_SESSION['userID']) OR( $_SESSION['tipoUsuario'] != 1)){
    session_destroy();
    header("Location: ../HTML/index.php");
    exit();
}

$user = new Usuario($_SESSION['name'], $_SESSION['username'], $_SESSION['userID']);

$nome = $user->getNome();

$conn = database::connect('localhost', 'root', '');

$livros = database::selectAllLivro($conn);


echo <<<HTML
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TRAÇAS</title>
  <link rel="stylesheet" href="../CSS/style.css" />
</head>

<body>
  <header>
    <nav>
      <a class="logo" href="#">Livros</a>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </nav>
  </header>
  
  <main>
  </main>

<div class="book-list-container">
    <h1 class="book-list-title">LIVROS PARA ALUGAR</h1>
<div class="book-list-wrapper">
<div class="book-list">
HTML;

foreach ($livros as $row) {
    echo <<<HTML
          
            <div class="book-list-item">
              <img class="book-list-item-img" src="../IMG/$row[tombo].jpg" alt="">
              <p class="book-list-item-title">$row[titulo]</p>
              <p class="book-list-item-autor">Autor: $row[autor]</p>
            </div>
          
HTML;
}

echo <<<END
            </div>
        </div>
    </div>
  </div>
  
</body>

END;





database::close($conn);
