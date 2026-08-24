<?php

session_start();
include_once("infra/connect.php");

$clientes = mysqli_query($conn, "SELECT * FROM clientes");
$donos = mysqli_query($conn, "SELECT * FROM clientes");
$animais = mysqli_query($conn, "SELECT * FROM animais");

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
    <form action="public/cadastro_usuario.php" method="POST">
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
    <form action="public/cadastro_animal.php" method="POST">
        <label for="nome"> Nome: </label>
        <input type="text" name="nome" required>
        <br>
        <label for="dono"> Dono: </label>
        <select name="dono" id="">
            <option value=""> Selecionar </option>
            <?php while ($dono = mysqli_fetch_assoc($donos)) 
            {
            echo "<option value=' {$dono['id']} '> {$dono['nome']} </option>";
            } ?>
        </select>
        <br>
        <button type="submit"> Cadastrar </button>
    </form>
    </div>
    </div>
    <h2> Clientes cadastrados: </h2>
    <table class="table01">
       <tr>
        <th> id </th>
        <th> Nome </th>
        <th> E-mail </th>
        <th> Mais informações </th>
        <th> Editar </th>
        <th> Excluir </th>
       </tr>
       <?php 
       while ($cliente = mysqli_fetch_assoc($clientes)) 
       { ?>
        <tr>
            <td> <?php echo $cliente["id"]; ?> </td>
            <td> <?php echo $cliente["nome"]; ?> </td>
            <td> <?php echo $cliente["email"]; ?> </td>
            <td> <a href="public/info.php?id=<?php echo $cliente["id"]; ?>"> Mais informações </a> </td>
            <td> <a href="public/editar.php?id=<?php echo $cliente["id"]; ?>"> Editar </a> </td>
            <td> <a href="public/excluir_usuario.php?id=<?php echo $cliente["id"]; ?>"> Excluir </a> </td>
        </tr>
       <?php } ?>
    </table>

    <h2> Animais cadastrados </h2>
    <table class="table01">
        <tr>
            <th> id </th>
            <th> Nome </th>
            <th> Dono </th>
            <th> Editar </th>
            <th> Excluir </th>
       </tr>
       <tr>
            <?php
               while ($animal = mysqli_fetch_assoc($animais)) 
                { ?>
                    <tr>
                        <td> <?php echo $animal["id"]; ?> </td>
                        <td> <?php echo $animal["nome"]; ?> </td>
                        <?php $nome_dono = mysqli_query($conn, "SELECT nome FROM clientes WHERE id = {$animal['dono']}"); ?>
                        <td> <?php echo $nome_dono; ?> </td>
                        <td> <a href="public/editar.php?id=<?php echo $animal["id"]; ?>"> Editar </a> </td>
                        <td> <a href="public/excluir_animal.php?id=<?php echo $animal["id"]; ?>"> Excluir </a> </td>
                    </tr>
                <?php } ?> 
       </tr>
    </table>
</body>
<footer>

</footer>
</html>