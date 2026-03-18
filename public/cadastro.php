<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do participante</title>

    <link rel="stylesheet" href="css/loginECadastro.css">
</head>
<body class="auth-body">

<div class="auth-container">

    <h2 class="auth-title">Criar conta</h2>

    <form method="POST" class="auth-form">

        <input class="input" type="text" name="nome" placeholder="Nome" required>

        <input class="input" type="email" name="email" placeholder="Email">

        <input class="input" type="text" name="telefone" placeholder="Telefone">

        <input class="input" type="password" name="senha" placeholder="Senha" required>

        <button class="btn btn-primary" type="submit">Cadastrar</button>

    </form>

    <p class="auth-link">
        Já tem conta? <a href="login.php">Entrar</a>
    </p>

</div>

</body>
</html>

<?php

require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

$participanteController = new ParticipanteController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $participanteController->cadastrar($nome, $email, $telefone, $senha);
    header('Location: login.php');
}
?>