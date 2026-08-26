<?php 

include_once("../infra/connect.php");

$id = $_GET['id']; 

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
        $nome = $_POST["nome"];
        $raca = $_POST["raca"];
        $life = $_POST["life"];

$sql = "UPDATE animais SET nome = ?, race = ?, life = ? WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $raca, $life);
$stmt->execute();
$stmt->close();
header("Location: ../index.php");
exit;
}

$animais = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM animais WHERE id = $id"));
$donos = mysqli_query($conn, "SELECT * FROM clientes");
$defaultdono = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nome FROM clientes WHERE id = {$animais['dono']}"));
?>
<h1> Editar Animal </h1>
<form method="POST"> 
<label for="nome"> Nome: </label>
        <input type="text" name="nome" value="<?php echo $animais['nome'] ?>" required>
        <br>
        <label for="raca"> Raça/Espécie: </label>
        <input type="text" name="raca" value="<?php echo $animais['race'] ?>" required>
        <br>
        <label for="life"> Status </label>
        <select name="life" id="">
            <option value="vivo"> Vivo </option>
            <option value="Morto"> Morto </option>
        </select>
        <br>
        <button type="submit"> Cadastrar </button>

</form>