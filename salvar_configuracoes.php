<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nova_senha = $_POST['nova_senha'];
    $email_notifications = isset($_POST['email_notifications']) ? true : false;
    $tema = $_POST['tema'];

    $dados = array(
        'senha' => $nova_senha,
        'email_notifications' => $email_notifications,
        'tema' => $tema,
    );

    file_put_contents('dados.json', json_encode($dados));

    echo "Configurações salvas com sucesso!";
}
?>
