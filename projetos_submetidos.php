<?php
include 'db_connect.php';

$sql = "SELECT p.id, p.nome, p.descricao, p.notaprof, p.notageral, f.nome AS festival, p.statusprojeto 
        FROM projeto p
        JOIN festival f ON p.festival_id = f.id
        WHERE p.statusprojeto = 'submetido'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetos Submetidos para Aprovação</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .main-container {
            width: 80%;
            max-width: 1200px;
            margin-top: 20px;
        }

        .project-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .project-table th, .project-table td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .project-table th {
            background-color: #6c63ff;
            color: white;
        }

        .project-table tr:hover {
            background-color: #f1f1f1;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons button {
            padding: 10px;
            font-size: 0.9em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .approve-button {
            background-color: #4caf50;
            color: white;
        }

        .reject-button {
            background-color: #f44336;
            color: white;
        }

        .approve-button:hover {
            background-color: #45a049;
        }

        .reject-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">AVALIAFEST</div>
        <nav>
            <a href="index.html">Home</a> | 
            <a href="projetos_aprovacao.php">Projetos para Aprovação</a> |
            <a href="notifica.php">Notificações</a> |
            <a href="config.html">Configurações</a>
        </nav>
    </header>

    <div class="main-container">
        <h1>Projetos Submetidos para Aprovação</h1>

        <table class="project-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Projeto</th>
                    <th>Descrição</th>
                    <th>Nota Profissional</th>
                    <th>Nota Geral</th>
                    <th>Festival</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['descricao']; ?></td>
                            <td><?php echo $row['notaprof']; ?></td>
                            <td><?php echo $row['notageral']; ?></td>
                            <td><?php echo $row['festival']; ?></td>
                            <td><?php echo $row['statusprojeto']; ?></td>
                            <td class="action-buttons">
                                <form action="aprovar_rejeitar.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="acao" value="aprovar" class="approve-button">Aprovar</button>
                                    <button type="submit" name="acao" value="rejeitar" class="reject-button">Rejeitar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">Nenhum projeto encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php $conn->close(); ?>
</body>
</html>
