<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <a href="../public/index.php">Página inicial</a>
    </header>
    
</body>
</html>

<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/EventosController.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/InscricoesController.php";

if (!isset($_SESSION['participante'])) {
    header("Location: ../public/login.php");
    exit;
}

$participantes = $_SESSION['participante'];



$participanteController = new ParticipanteController($pdo);
$eventoController = new EventosController($pdo);
$inscricoesController = new InscricoesController($pdo);




$participantes = $participanteController->listar();
$eventos = $eventoController->listar();
$inscricoes = $inscricoesController->listar();

?>
        

