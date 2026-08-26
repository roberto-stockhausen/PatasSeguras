<?php 

include_once("../infra/connect.php");

if ($_SERVER["REQUEST_METHOD"] === "GET")
    {
        $id = $_GET["id"];
        //$nome = $_GET["nome"];
    }
$clientes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM clientes WHERE id = $id"));
$animais = mysqli_query($conn, "SELECT * FROM animais WHERE dono = $id");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>
</head>
<body>
<?php
echo "<h1> {$clientes['nome']} </h1>";
echo "<h3> Email: {$clientes['email']} </h3>";
echo "<h3> Animais: </h3>";
?>
<table class="table01">
        <tr>
            <th> id </th>
            <th> Nome </th>
            <th> Dono </th>
            <th> Editar </th>
            <th> Excluir </th>
       </tr>
<?php while ($animal = mysqli_fetch_assoc($animais))
    { ?>
        <tr>
            <td> <?php echo $animal["id"]; ?> </td>
            <td> <?php echo $animal["nome"]; ?> </td>
            <?php $nome_dono =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT nome FROM clientes WHERE id = {$animal['dono']}")); ?>
            <td> <?php echo $nome_dono["nome"]; ?> </td>
            <td> <a href="editar.php?id=<?php echo $animal["id"]; ?>"> Editar </a> </td>
            <td> <a href="excluir_animal.php?id=<?php echo $animal["id"]; ?>"> Excluir </a> </td>
        </tr>
    <?php } ?> 
</table>
</body>
</html>
