<?php

include_once("infra/connect.php");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<header>

</header>
<body>
    <div class="flex">
    <div class="form">
    <h1> Cadastro de usuários: </h1>
    <form action="cadastro_usuario.php" method="POST">
        <label for="nome"> Nome: </label>
        <input type="text" name="nome" required>
        <br>
        <label for="email"> E-mail: </label>
        <input type="email" name="email" required>
        <br>
        <button type="submit"> Cadastrar </button>
    </form>
    </div>
    <div class="space"> </div>
    <div class="form">
    <h1> Cadastro de animais: </h1>
    <form action="cadastro_animal.php" method="POST">
        <label for="nome"> Nome: </label>
        <input type="text" name="nome" required>
        <br>
        <label for="email"> E-mail: </label>
        <input type="email" name="email" required>
        <br>
        <button type="submit"> Cadastrar </button>
    </form>
    </div>
    </div>
</body>
<footer>

</footer>
</html>