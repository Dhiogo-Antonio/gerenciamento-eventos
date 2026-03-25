<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/gerenciamento-eventos/db/database.php";

if (!isset($_SESSION['participante'])) {
    header("Location: login.php");
    exit;
}

$participante = $_SESSION['participante'];

$stmt = $pdo->query("SELECT * FROM eventos ORDER BY data ASC");
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="css/style.css">

<div class="container">



<div class="top-actions">
    <h2 class="title">Olá, <?php echo $participante['nome']; ?></h2>
    <?php if ($participante['tipo'] == 'admin'): ?>
        <a class="btn btn-success" href="../admin/index.php">Admin</a>
    <?php endif; ?>

    <a class="btn btn-danger" href="logout.php">Sair</a>
</div>

<h3 class="subtitle">Eventos disponíveis</h3>

<div class="cards">

<?php foreach ($eventos as $evento): 

$stmtCount = $pdo->prepare("SELECT COUNT(*) as total FROM inscricoes WHERE evento_id = :id");
$stmtCount->execute([':id' => $evento['id']]);
$total = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];

$stmtCheck = $pdo->prepare("SELECT * FROM inscricoes WHERE evento_id = :evento AND participante_id = :participante");
$stmtCheck->execute([
    ':evento' => $evento['id'],
    ':participante' => $participante['id']
]);

$jaInscrito = $stmtCheck->rowCount() > 0;
?>

<div class="card">
    <h3 class="card-title"><?php echo $evento['nome']; ?></h3>

    <p class="card-desc"><?php echo $evento['descricao']; ?></p>

    <p class="card-info">
         <span style="color:red">Data: </span><?php echo $evento['data']; ?> <br><br>
        <span style="color:red">Horário: </span><?php echo $evento['horario']; ?>
    </p>

    <p class="card-local"> <span style="color:red">Local: </span><?php echo $evento['local']; ?></p>

    <p class="card-vagas">
        <span style="color:red">Vagas:</span> <?php echo "$total / {$evento['max_participantes']}"; ?>
    </p>

    <?php if ($jaInscrito): ?>
        <span class="status status-ok">Já inscrito</span><br><br>

        <a class="btn btn-danger" 
           href="../usuario/cancelarInscricao.php?id=<?php echo $evento['id']; ?>"
           onclick="return confirm('Deseja cancelar a inscrição?')">
            Cancelar inscrição
        </a>

    <?php elseif ($total < $evento['max_participantes']): ?>
        <a class="btn btn-primary" href="../usuario/inscrever.php?id=<?php echo $evento['id']; ?>">
            Inscrever
        </a>

    <?php else: ?>
        <span class="status status-full">Lotado</span>
    <?php endif; ?>
</div>

<?php endforeach; ?>

</div>
</div>