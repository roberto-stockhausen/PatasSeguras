<?php 

include_once("../infra/connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $nome = $_POST["nome"];
        $dono = $_POST["dono"];
    }

$sql = "INSERT INTO animais (nome, dono) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $nome, $dono);
$stmt->execute();
$stmt->close();
header("Location: ../index.php");
exit;

?>