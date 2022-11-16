<?php
echo <<< PAGE
<html lang="pt-br">
<head>
    <title>Biblioteca fatec</title>
</head>

<body>

    <h1>Biblioteca da fatec</h1>
    <form action="../PHP/login.php" method="post">
        <label for="login-user">login</label>
        <input type="text" id="login-user" name="user" required><br>
        <label for="login-password">senha</label>
        <input type="password" id="login-password" name="password" required><br>
        <input type="submit" value="Login">
    </form>


</body>

</html>
PAGE;

