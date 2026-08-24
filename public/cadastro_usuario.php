<?php 

include_once("../infra/connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
    }

$sql = "INSERT INTO clientes (nome, email) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome, $email);
$stmt->execute();
$stmt->close();

header("Location: ../index.php");
exit;

?>