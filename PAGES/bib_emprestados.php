<?php


include_once("bib_session.php");

$bibliotecario = new Bibliotecario($_SESSION['name'], $_SESSION['username'], $_SESSION['userID']);


$conn = database::connect('localhost', 'root', '');

$livros = database::selectLivrosEmprestados($conn);
echo "<h2>Livros Emprestados:</h2>";

if($livros == null){
    echo "Nenhum livro emprestado";
}else{
    foreach ($livros as $row) {
        echo <<<HTML
            
              <div class="book-list">
                <div class="book-list-item">
                  <img class="book-list-item-img" src="../IMG/$row[tombo].jpg" alt="" width="270px" height="200px">
                  <p class="book-list-item-title">$row[titulo] - Autor: $row[autor]</p>
                  <p>Emprestado para: $row[usuario]</p>
                </div>
              </div>
            
HTML;

    }
}



database::close($conn);