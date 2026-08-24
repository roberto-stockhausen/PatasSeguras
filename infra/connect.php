<?php

$host = "localhost";
$user = "root";
$password = "root";
$database = "roberto_patas_seguras";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error)
    {
        die("Não foi possível conectar com o servidor: " . $conn->connect_error);
    }

?>