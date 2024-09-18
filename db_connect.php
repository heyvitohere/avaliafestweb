<?php
$servername = "localhost";
$username = "root"; 
$password = "";   
$dbname = "bd_avaliacao_2a";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
