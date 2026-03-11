<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do participante</title>
</head>
<body>
    <form method="POST">

<input type="text" name="nome" placeholder="Nome" required>

<input type="email" name="email" placeholder="Email">

<input type="text" name="telefone" placeholder="Telefone">

<button type="submit">Cadastrar</button>

</form>

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

     $participanteController->cadastrar($nome, $email, $telefone);
    header('Location: ../../public/index.php');

}

?>