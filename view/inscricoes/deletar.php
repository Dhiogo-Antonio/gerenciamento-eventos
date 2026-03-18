<?php

require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/InscricoesController.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

$InscricoesController = new InscricoesController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $inscricoes = $InscricoesController->deletar($id);
    header ('Location: ../../admin/index.php');
} else{
    header ('Location: ../../admin/index.php');
}




?>