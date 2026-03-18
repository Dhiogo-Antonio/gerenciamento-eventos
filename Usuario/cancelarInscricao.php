<?php
session_start();
require_once "../db/database.php";

// 🔐 Verifica login
if (!isset($_SESSION['participante'])) {
    header("Location: ../public/login.php");
    exit;
}

$participante = $_SESSION['participante'];
$evento_id = $_GET['id'];

// Deletar inscrição
$stmt = $pdo->prepare("DELETE FROM inscricoes 
                       WHERE evento_id = ? 
                       AND participante_id = ?");
$stmt->execute([$evento_id, $participante['id']]);

header("Location: ../public/index.php");
exit;