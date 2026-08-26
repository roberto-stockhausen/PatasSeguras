<?php 

include_once("../infra/connect.php");

$id = $_GET['id']; 

if ($_SERVER['REQUEST_METHOD'] === "POST")
{
        $nome = $_POST["nome"];
        $email = $_POST["email"];

$sql = "UPDATE clientes SET nome = ?, email = ? WHERE id = $id";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome, $email);
$stmt->execute();
$stmt->close();
header("Location: ../index.php");
exit;
}

$clientes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM clientes WHERE id = $id"));

?>
<h1> Editar Cliente </h1>
<form method="POST"> 
<label for="nome"> Nome: </label>
        <input type="text" name="nome" value="<?php echo $clientes['nome'] ?>" required>
        <br>
        <label for="raca"> Raça/Espécie: </label>
        <input type="email" name="email" value="<?php echo $clientes['email'] ?>" required>
        <br>
        <button type="submit"> Cadastrar </button>

</form>