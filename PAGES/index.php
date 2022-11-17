<?php
echo <<< PAGE
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/index.css">
    <title>tela de login</title>
</head>
<body>
    <form action="login.php" method="post">
    <div class="main-login">
        <div class="left-login">
            <h1>Bem vindo de volta!</h1>
            <img src="../IMG/booklover.svg" class="left-login-image" alt="video">
        </div>
        <div class="rigth-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <div class="textfield">
                    <label for="login-user">Usuário</label>
                    <input type="text" id="login-user" name="user" placeholder="Usuário">
                </div>
                <div class="textfield">
                    <label for="login-password">Senha</label>
                    <input type="password" id="login-password" name="password" placeholder="Senha">
                </div>
                <button type="submit" class="btn-login">Logar</button>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
PAGE;

