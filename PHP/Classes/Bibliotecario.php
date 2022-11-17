<?php

require_once("Pessoa.php");
require_once("database.php");
require_once ("Usuario.php");
require_once ("Livro.php");

class Bibliotecario extends  Pessoa
{

    /**
     * @param string $nome
     * @param string $username
     * @param int $id
     */
    public function __construct(string $nome, string $username, int $id)
    {
        parent::__construct($nome, $username, $id);
    }

    public function emprestaLivro(Livro $livro, Usuario $aluno): bool
    {
        $conn = database::connect('localhost', 'root', '');
        $o_livro = database::selectLivro($livro->getTitulo(), $conn );

        if($o_livro == null){
            throw new \http\Exception\RuntimeException("Book does not exist");
        }
        if($o_livro->getEmprestado()){
            throw new \http\Exception\RuntimeException("Book has been already borrowed");
        }
        $tombo = $o_livro->getTombo();
        $SQL = "UPDATE livro set livro.emprestado = 1 where tombo = $tombo";

        $aluno->adicionaEmprestado($o_livro, $conn);

        $retorno = (bool)$conn->query($SQL);
        database::close($conn);

        return $retorno;


    }
}