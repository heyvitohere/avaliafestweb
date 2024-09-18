<?php
include 'db_connect.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$datainicio = isset($_POST['datainicio']) ? $_POST['datainicio'] : '';
$datafim = isset($_POST['datafim']) ? $_POST['datafim'] : '';
$localfestival = isset($_POST['localfestival']) ? $_POST['localfestival'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$statusfestival = isset($_POST['statusfestival']) ? $_POST['statusfestival'] : '';

if (empty($nome) || empty($datainicio) || empty($datafim) || empty($localfestival) || empty($descricao) || empty($statusfestival)) {
    echo "Todos os campos são obrigatórios!";
    exit;
}

$sql = "INSERT INTO festival (nome, datainicio, datafim, localfestival, descricao, statusfestival) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
}

$stmt->bind_param('ssssss', $nome, $datainicio, $datafim, $localfestival, $descricao, $statusfestival);

if ($stmt->execute()) {
    echo "Festival criado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Festival</title>
    <link rel="stylesheet" href="styles.css">
    <body>
<header>
    <div class="logo">AVALIAFEST</div>
    <nav>
        <a href="index.html">home</a>
        <a href="login.html">logout</a>
    </nav>
</header>

<div class="main-container">
    <aside class="sidebar">
        <div class="profile">
            <img src="fotodeperfil.png" alt="Foto de perfil">
            <h2>Ryan Christian</h2>
            <p>Administrador</p>
        </div>
        <div class="main-container">
        <aside class="sidebar">
            <div class="profile">
                <img src="fotodeperfil.png" alt="Foto de perfil">
                <h2>Ryan Christian</h2>
                <p>Administrador</p>
            </div>
            <ul class="menu">
                <li><a href="projetos_aceitos.html" >Projetos Aprovados</a></li>
                <li><a href="projetos_rejeitados.html" >Projetos Reprovados</a></li>
                <li><a href="listar_festivais.html">Festivais</a></li>
                <li><a href="notifica.html" >Notificações</a></li>
                <li><a href="config.html">Configurações</a></li>
            </ul>
        </aside>

    <h1>Criar Novo Festival</h1>
    <form action="criar_festival.php" method="POST">
        <label for="nome">Nome do Festival:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="datainicio">Data de Início:</label>
        <input type="date" id="datainicio" name="datainicio" required><br><br>

        <label for="datafim">Data de Fim:</label>
        <input type="date" id="datafim" name="datafim" required><br><br>

        <label for="localfestival">Local do Festival:</label>
        <input type="text" id="localfestival" name="localfestival" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"></textarea><br><br>

        <label for="statusfestival">Status do Festival:</label>
        <input type="text" id="statusfestival" name="statusfestival" required><br><br>

        <button type="submit">Criar Festival</button>
    </form>
</div>
</body>
</html>