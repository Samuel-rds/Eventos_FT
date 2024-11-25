<?php

$servernames = "localhost";
$usuario = "root";
$password = "";
$bdname = "unieventos";

$conn = new mysqli($servernames, $usuario, $password, $bdname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>