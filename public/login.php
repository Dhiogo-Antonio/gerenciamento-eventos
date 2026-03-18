<?php
session_start();

require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>


<form method="POST">

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="senha" placeholder="Senha" required><br><br>

    <button type="submit">Entrar</button>

</form>

<p>Não tem conta? <a href="cadastro.php">Cadastrar</a></p>


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