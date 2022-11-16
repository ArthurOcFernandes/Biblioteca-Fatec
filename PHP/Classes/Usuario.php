<?php

class Usuario extends Pessoa
{

    private $livrosEmprestados = array();

    public function getLivrosEmprestados()
    {
        return $this->livrosEmprestados;
    }
}