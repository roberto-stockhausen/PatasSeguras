<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
    }

$sql = "INSERT INTO usuarios VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome, $email);
$stmt->execute();
$stmt->close();
header("Locaion: index.php");
exit;

?>