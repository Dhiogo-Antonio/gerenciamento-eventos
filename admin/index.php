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
        

