<?php
include 'db_connect.php';

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$notaprof = $_POST['notaprof'];
$notageral = $_POST['notageral'];
$festival_id = $_POST['festival_id'];
$statusprojeto = $_POST['statusprojeto'];

$sql = "INSERT INTO projeto (nome, descricao, notaprof, notageral, festival_id, statusprojeto)
        VALUES ('$nome', '$descricao', '$notaprof', '$notageral', '$festival_id', '$statusprojeto')";

if ($conn->query($sql) === TRUE) {
    echo "Projeto inserido com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
