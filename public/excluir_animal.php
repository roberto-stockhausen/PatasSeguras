<?php 

include_once("../infra/connect.php");

if ($_SERVER["REQUEST_METHOD"] === "GET")
    {
        $id = $_GET["id"];
    }

$sql = "DELETE FROM animais WHERE id = (?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: ../index.php");
exit;

?>