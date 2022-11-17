<?php

class Pessoa
{



    private $nome;
    private $username;
    private $id;

    /**
     * @param string $nome
     * @param string $username
     * @param int $id
     */
    public function __construct(string $nome, string $username, int $id)
    {
        $this->setNome($nome);
        $this->setUsername($username);
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}