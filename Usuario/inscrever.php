<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

if (!isset($_SESSION['participante'])) {
    header("Location: ../public/login.php");
    exit;
}

$participante = $_SESSION['participante'];
$evento_id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM inscricoes WHERE evento_id = ? AND participante_id = ?");
$stmt->execute([$evento_id, $participante['id']]);

if ($stmt->rowCount() > 0) {
    echo "Você já está inscrito!";
    exit;
}

$stmt = $pdo->prepare("SELECT max_participantes FROM eventos WHERE id = ?");
$stmt->execute([$evento_id]);
$evento = $stmt->fetch();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM inscricoes WHERE evento_id = ?");
$stmt->execute([$evento_id]);
$total = $stmt->fetchColumn();

if ($total >= $evento['max_participantes']) {
    echo "Evento lotado!";
    exit;
}


$stmt = $pdo->prepare("INSERT INTO inscricoes (evento_id, participante_id) VALUES (?, ?)");
$stmt->execute([$evento_id, $participante['id']]);

header("Location: ../public/index.php");
exit;