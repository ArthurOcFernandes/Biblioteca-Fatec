<?php

require_once("Pessoa.php");

class Administrador extends Pessoa
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
}