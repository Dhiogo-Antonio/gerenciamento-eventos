<?php
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/controller/EventosController.php";

$eventocontroller = new EventosController($pdo);

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM eventos WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$evento = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $max = intval($_POST['max']);

    $eventocontroller->editar($id, $nome, $descricao, $data, $horario, $local, $max);

    header("Location: ../../admin/index.php");
    exit;
}
?>

<h2>Editar Evento</h2>

<form method="POST">
    Nome: <input type="text" name="nome" value="<?= $evento['nome'] ?>"><br>
    Descrição: <textarea name="descricao"><?= $evento['descricao'] ?></textarea><br>
    Data: <input type="date" name="data" value="<?= $evento['data'] ?>"><br>
    Horário: <input type="time" name="horario" value="<?= $evento['horario'] ?>"><br>
    Local: <input type="text" name="local" value="<?= $evento['local'] ?>"><br>
    Máximo: <input type="number" name="max" value="<?= $evento['max_participantes'] ?>"><br>

    <button>Salvar</button>
</form>