<?php 

include_once("../infra/connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $nome = $_POST["nome"];
        $raca = $_POST["raca"];
        $life = $_POST["life"];
        $dono = $_POST["dono"];
    }

$sql = "INSERT INTO animais (nome, race, life, dono) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $nome, $raca, $life, $dono);
$stmt->execute();
$stmt->close();
header("Location: ../index.php");
exit;

?>