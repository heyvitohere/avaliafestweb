<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Projeto</title>
</head>
<body>
    <h1>Criar Projeto</h1>
    <form action="inserir_projeto.php" method="POST">
        <label>Nome do Projeto:</label>
        <input type="text" name="nome" required><br>
        <label>Descrição:</label>
        <textarea name="descricao" required></textarea><br>
        <label>Nota do Professor:</label>
        <input type="number" step="0.01" name="notaprof" required><br>
        <label>Nota Geral:</label>
        <input type="number" step="0.01" name="notageral" required><br>
        <label>Festival ID:</label>
        <input type="number" name="festival_id" required><br>
        <label>Status do Projeto:</label>
        <input type="text" name="statusprojeto" required><br>
        <button type="submit">Salvar Projeto</button>
    </form>
</body>
</html>
