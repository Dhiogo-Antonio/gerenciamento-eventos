<?php

require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/EventosController.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

$EventosController = new EventosController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $eventos = $EventosController->deletar($id);
    header ('Location: ../../admin/index.php');
} else{
    header ('Location: index.php');
}




?>