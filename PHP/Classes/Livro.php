<?php

class Livro
{
    private $titulo;
    private $tombo;
    private $autor;
    private $emprestado;


    public function __construct($titulo, $autor, $tombo)
    {
        $this->autor = $autor;
        $this->titulo = $titulo;
        $this->tombo = $tombo;

    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return mixed
     */
    public function getTombo()
    {
        return $this->tombo;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    public function getEmprestado()
    {
        return $this->emprestado;
    }

    /**
     * @return bool
     */


}