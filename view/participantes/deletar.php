<?php

require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/ParticipanteController.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

$ParticipanteController = new ParticipanteController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $usuario = $ParticipanteController->deletar($id);
    header ('Location: ../../index.php');
} else{
    header ('Location: ../../index.php');
}




?>