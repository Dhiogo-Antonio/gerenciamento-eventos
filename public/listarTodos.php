<?php
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";


$stmt = $pdo->prepare('SELECT * FROM participantes');
$stmt->execute([]);



$participanteController = new ParticipanteController($pdo);


$participantes = $participanteController->Listar();



?>