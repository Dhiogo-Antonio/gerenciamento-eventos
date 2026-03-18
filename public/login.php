<?php
session_start();

require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="css/loginECadastro.css">
</head>
<body class="login-body">

<div class="login-wrapper">

    <h2 class="login-title">Login</h2>

    <form method="POST" class="login-form">

        <input class="input" type="email" name="email" placeholder="Email" required><br><br>

        <input class="input" type="password" name="senha" placeholder="Senha" required><br><br>

        <button class="btn btn-primary" type="submit">Entrar</button>

    </form>

    <p class="login-link">
        Não tem conta? <a href="cadastro.php">Cadastrar</a>
    </p>

</div>

</body>
</html>

<?php

require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/ParticipanteController.php";

$participanteController = new ParticipanteController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $participanteController->login($email, $senha);
}
?>