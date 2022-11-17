<?php
require_once("Usuario.php");
require_once("Bibliotecario.php");
require_once("Administrador.php");
require_once("Livro.php");


class database
{
    static function connect($server, $user, $password)
    {
        $conn = new mysqli($server, $user, $password);
        if ($conn->connect_error) {
            die("Connection failed");
        }
        return $conn;
    }

    static function selectUser($username, $conn)
    {
        $SQL = <<<QUERY
        select * from usuario where user = $username
QUERY;

        $result = $conn->query($SQL);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            switch ($row['tipo_usuario']) {
                case 1:
                    return new Usuario($row['nome'], $row['user'], $row['id']);
                case 2:
                    return new Bibliotecario($row['nome'], $row['user'], $row['id']);
                case 3:
                    return new Administrador($row['nome'], $row['user'], $row['id']);
            }

        }
        return null;
    }

    static function selectLivro($titulo, $conn): ?Livro
    {

        $conn->query("USE biblioteca");
        $SQL = "SELECT * FROM livro WHERE livro.titulo = '$titulo'";
        $result = $conn->query($SQL);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new Livro($row['titulo'], $row['autor'], $row['tombo']);

        }
        return null;
    }

    static function selectUsuario($user, $conn): ?Usuario
    {

        $conn->query("USE biblioteca");
        $SQL = "SELECT * FROM usuario WHERE usuario.user = '$user'";
        $result = $conn->query($SQL);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            return new Usuario($row['nome'], $row['user'], $row['id']);

        }
        return null;
    }

    static function selectAllLivro($conn)
    {
        $conn->query("USE biblioteca");
        $SQL = "SELECT * FROM livro";
        $result = $conn->query($SQL);

        if ($result->num_rows > 0) {
            return $result;
        }
        return null;
    }

    static function selectLivrosEmprestados($conn)
    {
        $conn->query("USE biblioteca");
        $SQL = "SELECT livro.tombo as tombo, livro.titulo as titulo, livro.autor as autor, livro.emprestado as emprestado, usuario.nome as usuario FROM livro  inner join usuario inner join emprestimo on emprestimo.usuario = usuario.id and emprestimo.livro = livro.tombo";
        $result = $conn->query($SQL);

        if ($result->num_rows > 0) {
            return $result;
        }
        return null;
    }

    static function insertEmprestimo(Livro $livro, Usuario $usuario, $conn): bool
    {

        $tombo = $livro->getTombo();
        $userId = $usuario->getId();
        $data = date('Y-m-d');
        echo $data;
        $SQL = "INSERT INTO emprestimo (usuario, livro, data)  values ($userId, $tombo, '$data')";

        return $conn->query($SQL) === true;
    }

    static function close($conn)
    {
        $conn->close();
    }

}

