<?php

require_once("../PHP/Classes/Bibliotecario.php");
require_once("../PHP/Classes/Usuario.php");
include_once("bib_session.php");


$bibliotecario = new Bibliotecario($_SESSION['name'], $_SESSION['username'], $_SESSION['userID']);


$conn = database::connect('localhost', 'root', '');

$livros = database::selectLivrosEmprestados($conn);

echo <<<HTML
    <button type="button" id="myButton" >Visualizar emprestados</button>
    
    <h2>Emprestar livros</h2>
    <form action="bit_emprestar.php" method="post">
        <label for="user">Usuário</label>
        <input type="text" name="user" id="user">
        <label for="titulo">Nome do Livro</label>
        <input type="text" name="titulo" id="titulo">
        <button type="submit">Emprestar</button>
    </form>
    
    <script type="text/javascript">
        document.getElementById("myButton").onclick = () => {
            location.href = "./bib_emprestados.php";
        }
</script>
HTML;






database::close($conn);
