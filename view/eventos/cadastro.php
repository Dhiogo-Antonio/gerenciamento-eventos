<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    Nome: <input type="text" name="nome"><br>
    Descrição: <textarea name="descricao"></textarea><br>
    Data: <input type="date" name="data"><br>
    Horário: <input type="time" name="horario"><br>
    Local: <input type="text" name="local"><br>
    Máximo de Participantes: <input type="number" name="max_participantes"><br>
    <button type="submit">Cadastrar</button>
</form>
</body>
</html>

<?php

require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/EventosController.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

$eventosController = new EventosController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $max_participantes = intval($_POST['max_participantes']);

     $eventosController->cadastrar($nome, $descricao, $data, $horario, $local, $max_participantes);
    header('Location: ../../admin/index.php');

}

?>