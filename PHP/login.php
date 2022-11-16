<?php

require("./Classes/database.php");

/**
 * @throws Exception
 */
function login($user, $password)
{
    $conn = database::connect('localhost', 'root', '');

    $SQL = <<<QUERY
            SELECT * FROM biblioteca.usuario where user = '$user'     
QUERY;

    $result = $conn->query($SQL);
    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if ($password == $row['senha']) {
            return $row;
        }
        return null;
    }
    database::close($conn);
    throw new Exception('User does not exist');
}


$user = $_POST['user'];
$password = $_POST['password'];

try {
    $user = login($user, $password);
    if ($user != null) {

        if(!isset($_SESSION)) session_start();

        $_SESSION['userID'] = $user['id'];
        $_SESSION['name'] = $user['nome'];
        $_SESSION['username'] = $user['user'];
        $_SESSION['tipoUsuario'] = $user['tipo_usuario'];
        $url = "";
        switch ($user['tipo_usuario']) {
            case 1:
                $url = "indexUser.php";
                break;
            case 2:
                $url = "indexBibliotecario.php";
                break;
            case 3:
                $url = "indexAdmin.php";
                break;
        }

        header("Location:" . $url);
        exit();
    } else echo 'Wrong credentials';
} catch (Exception $e) {
    echo "User does not exist <a href='../HTML/index.php'>go back</a>";
}
