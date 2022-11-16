<?php

class database{
    static function connect($server, $user, $password)
    {
        $conn = new mysqli($server, $user, $password);
        if ($conn->connect_error) {
            die("Connection failed");
        }
        return $conn;
    }


    static function close($conn)
    {
        $conn->close();
    }

}

